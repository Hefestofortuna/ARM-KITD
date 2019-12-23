<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use \app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Shl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php// $model->number_scheme != NULL ?  $form->field($model, 'number_scheme')->textInput(['readonly'=>true]) : $form->field($model, 'number_scheme')->textInput() ?>
    <div class="row">
        <div class="col-lg-6">            
            
    <?= $form->field($model, 'date_shl')->widget(DatePicker::className(), [
        'value' => '02-16-2012',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

    <?= $form->field($model, 'result')->dropDownList(['2'=>'Опровергнуто','1'=>'Согласованно'])?>

    <?= $form->field($model, 'date_utv')->widget(DatePicker::className(), [
        'value' => '02-16-2012',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

    <?= $form->field($model, 'page_serch')->textInput(['type'=>'number']) ?>
        </div>
        
        <div class="col-lg-6">            
         
    <?= $form->field($model, 'page_fix')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'page_retur')->textInput(['type'=>'number']) ?>
    
    <?= $form->field($model, 'fix_serch')->dropDownList(ArrayHelper::map(User::find()->where(['post'=>Yii::$app->user->identity->post])->all(),'id','fio'))?>
    
    <?= $form->field($model, 'date_ex_sh')->widget(DatePicker::className(), [
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
