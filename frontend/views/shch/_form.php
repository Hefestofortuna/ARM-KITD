<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Shch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php// $form->field($model, 'number_scheme')->textInput() ?>
    <div class="row">
        <div class="col-lg-6">   
        <?= $form->field($model, 'date_shch')->widget(DatePicker::className(), [
        'value' => '02-16-2012',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

<?= $form->field($model, 'number_date_protocol')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'date_plan')->widget(DatePicker::className(), [
        'value' => '02-16-2012',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

<?= $form->field($model, 'date_fuck')->widget(DatePicker::className(), [
        'value' => '02-16-2012',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

<?= $form->field($model, 'date_shl')->widget(DatePicker::className(), [
        'value' => '02-16-2012',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

<?= $form->field($model, 'number_date_raport')->textInput(['maxlength' => true]) ?>

        </div>
            <div class="col-lg-6">
<?= $form->field($model, 'couse')->textInput(['maxlength' => true]) ?>
            
<?= $form->field($model, 'date_scheme')->widget(DatePicker::className(), [
        'value' => '02-16-2012',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

<?= $form->field($model, 'otv')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ispol')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'date_ex')->widget(DatePicker::className(), [
        'value' => '02-16-2012',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

            </div>
    </div>
        
  

    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
