<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \app\models\Station;
use \app\models\User;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\ActiveForm;
use \app\models\Scheme;
/* @var $this yii\web\View */
/* @var $model app\models\Scheme */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-lg-4">            
            
            <?= $form->field($model, 'number')->Label('Предлогаемый номер изменения: ' . (Scheme::find()->where(['id_org'=>Yii::$app->user->identity->org])->max('number') + 1)) ?>

            <?= $form->field($model, 'date')->widget(DatePicker::className(), [
        'value' => '02-16-2012',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>      

            <?= $form->field($model, 'id_station')->dropDownList(ArrayHelper::map(Station::find()->where(['id_org'=>Yii::$app->user->identity->org])->all(),'id','name'))?>   
        </div>
    </div>

    

    <?= $form->field($model, 'scheme')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'descriptin')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'reason')->textarea(['maxlength' => true]) ?>

    <?php // $form->field($model, 'result')->textInput(['style'=>'width:80px']) ?>

    <?= $form->field($model, 'page')->textInput(['type'=>'number','style'=>'width:80px']) ?>

    <?= $form->field($model, 'id_author')->dropDownList(ArrayHelper::map(User::find()->where(['org'=>Yii::$app->user->identity->org])->all(),'id','fio'),['style'=>'width:280px'])?>

    <?php //  $form->field($model, 'id_org')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Добавить изменение в АРМ', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

