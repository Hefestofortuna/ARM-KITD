<?php
use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */

$this->title = 'АРМ-КИТД';
?>
<div class="site-index">

   <!--<div class="jumbotron">
        
    </div>
-->
    <div class="body-content">

        <div class="row">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'number',
            'id_org',
            [
                'attribute' => 'id_station',
                'content' => function($model){
                    return $model->station->name;
                }
            ],
            'date',
            'scheme',
            'descriptin',
            'reason',
            [
                'attribute' => 'result',
                'filter'=>['0'=>'На рассмотрении','1'=>'Опровергнуто','2'=>'Согласованно'],
                'headerOptions' => ['style' => 'width:11%'],
                'content' => function($model){
                    if($model->result == 1){
                        return '<font color="red">Опровергнуто</font>';
                    }elseif($model->result == 2){
                        return '<font color="green">Согласованно</font>';
                    }else{
                      return '<font color="orange">На рассмотрении</font>';
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
