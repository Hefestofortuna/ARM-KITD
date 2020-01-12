<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shch-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Shch', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'number_scheme',
            'date_shch',
            'number_date_protocol',
            'date_plan',
            //'date_fuck',
            //'date_shl',
            //'number_date_raport',
            //'couse',
            //'date_scheme',
            //'otv',
            //'ispol',
            //'date_ex',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
