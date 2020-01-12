<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shch-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'number_scheme') ?>

    <?= $form->field($model, 'date_shch') ?>

    <?= $form->field($model, 'number_date_protocol') ?>

    <?= $form->field($model, 'date_plan') ?>

    <?php // echo $form->field($model, 'date_fuck') ?>

    <?php // echo $form->field($model, 'date_shl') ?>

    <?php // echo $form->field($model, 'number_date_raport') ?>

    <?php // echo $form->field($model, 'couse') ?>

    <?php // echo $form->field($model, 'date_scheme') ?>

    <?php // echo $form->field($model, 'otv') ?>

    <?php // echo $form->field($model, 'ispol') ?>

    <?php // echo $form->field($model, 'date_ex') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
