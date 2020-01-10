<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SchemeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scheme-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'number') ?>

    <?= $form->field($model, 'id_shch') ?>

    <?= $form->field($model, 'id_shl') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'id_station') ?>

    <?php // echo $form->field($model, 'scheme') ?>

    <?php // echo $form->field($model, 'descriptin') ?>

    <?php // echo $form->field($model, 'reason') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'page') ?>

    <?php // echo $form->field($model, 'id_author') ?>

    <?php // echo $form->field($model, 'id_org') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
