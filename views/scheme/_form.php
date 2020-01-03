<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Scheme */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scheme-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'id_station')->textInput() ?>

    <?= $form->field($model, 'scheme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descriptin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'result')->textInput() ?>

    <?= $form->field($model, 'page')->textInput() ?>

    <?= $form->field($model, 'id_author')->textInput() ?>

    <?= $form->field($model, 'id_org')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
