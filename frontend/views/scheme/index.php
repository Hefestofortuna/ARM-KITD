<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchemeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schemes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scheme-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Scheme', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'number',
            'date',
            [
                'attribute' => 'id_station',
                'content' => function($model){
                    return $model->station->name;
                }
            ],
            //'scheme',
            //'descriptin',
            //'reason',
            //'result',
            //'page',
            //'id_author',
            //'id_org',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
