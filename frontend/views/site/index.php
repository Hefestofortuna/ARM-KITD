<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\TableshchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'АРМ-КИТД';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Список изменений</h1>
    </div>

    <div class="body-content">
        <p>
            <?= Html::a('Добавить проект', ['scheme/create'], ['class' => 'btn btn-success']) ?>
        </p>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
               
        'options' => ['style' => 'table-layout:fixed;' ],        
        'columns' => [
            
            //['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'number',
                'headerOptions' => ['style' => 'width: 5%'],
            ],
            [
                'attribute'=>'date',
                'headerOptions' => ['style' => 'width: 5%'],
                'format' => ['date', 'dd.MM.yyyy'],
            ],
            [
                'attribute' => 'id_station',
                'content' => function($model){
                    return $model->station->name;
                }
            ],
            'scheme',
            [
                'attribute'=>'descriptin',
                'headerOptions' => ['style' => 'width:15%'],
            ],
            'reason',
            [
                'attribute' => 'date_utv',
                'headerOptions' => ['style' => 'width: 5%'],
                'content' => function($model){
                    return Yii::$app->formatter->asDate($model->shl->date_utv, 'dd.MM.yyyy');
                },
            ],
            [
                'attribute' => 'date_fuck',
                'headerOptions' => ['style' => 'width: 5%'],
                'content' => function($model){
                    return Yii::$app->formatter->asDate($model->shch->date_fuck, 'dd.MM.yyyy');
                },
            ],
            [
                'attribute' => 'result',
                'headerOptions' => ['style' => 'width:11%'],
                'content' => function($model){
                    if($model->result != 1){
                        return '<font color="red">Спровергнуто</font>';
                    }else{
                        return '<font color="green">Согласованно</font>';
                    }
                }
            ],
            //'page',
            //'id_author',
            //'id_org',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}    {delete}',
            'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    $url ='index.php?r=scheme/view&id='.$model->id;
                    return $url;
                }
    
                //if ($action === 'update') {
                 //   $url ='index.php?r=scheme/update&id='.$model->id;
                //    return $url;
                //}
                if ($action === 'delete') {
                    $url ='index.php?r=scheme/delete&id='.$model->id;
                    return $url;
                }
    
              },      
        ],
        ],
    ]); ?>
    </div>
</div>
