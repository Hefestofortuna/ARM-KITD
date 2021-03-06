<?php
    use yii\helpers\Html;
use yii\grid\GridView;
use \yii\helpers\ArrayHelper;
use \app\models\Org;
use \app\models\Scheme;
use yii\db\Query;
use \yii\bootstrap\Modal;
use dosamigos\datepicker\DatePicker;
use \app\models\Site;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
$this->title = 'АРМ-КИТД';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?php Modal::begin([
                'header' => "Формирования отчета в Excel:",
                'toggleButton' => [
                'label' => 'Формирование отчета',
                'tag' => 'button',
                'class' => 'btn btn-primary btn btn-block',
                    ],
            ]);
            $form = ActiveForm::begin();
            echo $form->field($model_site, 'date_first')->widget(DatePicker::className(), [
                'attribute' => 'model_site',
                'language'=>'ru',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            echo $form->field($model_site, 'date_second')->widget(DatePicker::className(), [
                'attribute' => 'model_site',
                'language'=>'ru',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            echo Html::a('Скачать отчет', ['/site/download'], ['class' => 'btn btn-primary','data'=>['method' => 'post','derp'=>'herp']]);
            ActiveForm::end();
            Modal::end();
            ?>
            <br/>
        <?= Yii::$app->user->identity->id_post != "2" ? Html::a('Добавить проект', ['/scheme/create', 'id' => $model->id], ['class' => 'btn btn-success btn btn-block']) : null ?>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,'options' => ['style' => 'max-width: 100%;'],//Очень годно!Не дает выйти гриду за пределы экрана
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'number',
            [
                'attribute' => 'id_org',
                'filter'=>ArrayHelper::map(Org::find()->all(),'id','code'),
                'content' => function($model){
                    return $model->org->code;
                },
                'visible' => Yii::$app->user->identity->id_post != 1,
            ],
            [
                'attribute' => 'id_station',
                'content' => function($model){
                    return $model->station->name;
                }
            ],
            [
                'attribute'=>'date',
                //'headerOptions' => ['style' => 'width: 5%'],
                'format' => ['date', 'dd.MM.yyyy'],
            ],
            'scheme',
            'descriptin',
            'reason',
            [
                'attribute' => 'id_shch',

                'content' => function($model){
                    return Yii::$app->formatter->asDate($model->shch->date_fuck, 'dd.MM.yyyy');
                }
            ],
            [
                'attribute' => 'id_shl',
                'content' => function($model){
                    return Yii::$app->formatter->asDate($model->shl->date_utv, 'dd.MM.yyyy');
                }
            ],
            [
                'attribute' => 'result',
                'filter'=>['0'=>'В работе у ШЛ','1'=>'Возвращено','2'=>'Утверждено','3'=>'Отправлено в ШЛ','4'=>'В работе у ШЧ'],
                'headerOptions' => ['style' => 'width:11%'],
                'content' => function($model){
                    if($model->result == 1)
                    {
                        return '<font color="red">Возвращено</font>';
                    }
                    elseif($model->result ==2)
                    {
                        return '<font color="green">Утверждено</font>';
                    }
                    elseif($model->result ==0)
                    {
                        return '<font color="orange">В работе у ШЛ</font>';
                    }
                    elseif($model->result == 3)
                    {
                        return '<font color="#6495ed">Отправлено в ШЛ</font>';
                    }
                    elseif($model->result == 4)
                    {
                        return '<font color=purple>В работе у ШЧ</font>';
                    }

                }
            ],
            //'page',
            //'id_author',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}    {delete}',
            'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    $url ='/scheme/view?id='.$model->id;
                    return $url;
                }

                //if ($action === 'update') {
                 //   $url ='index.php?r=scheme/update&id='.$model->id;
                //    return $url;
                //}
                if ($action === 'delete') {
                    $url ='/scheme/delete?id='.$model->id;
                    return $url;
                }

              },
        ],
        ],
    ]); ?>
        </div>
    </div>
</div>
