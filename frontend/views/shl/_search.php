<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'number_scheme') ?>

    <?= $form->field($model, 'date_shl') ?>

    <?= $form->field($model, 'result') ?>

    <?= $form->field($model, 'date_utv') ?>

    <?php // echo $form->field($model, 'page_serch') ?>

    <?php // echo $form->field($model, 'page_fix') ?>

    <?php // echo $form->field($model, 'page_retur') ?>

    <?php // echo $form->field($model, 'fix_serch') ?>

    <?php // echo $form->field($model, 'date_ex_sh') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
