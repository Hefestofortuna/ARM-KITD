<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shl-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Shl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'number_scheme',
            'date_shl',
            'result',
            'date_utv',
            //'page_serch',
            //'page_fix',
            //'page_retur',
            //'fix_serch',
            //'date_ex_sh',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
