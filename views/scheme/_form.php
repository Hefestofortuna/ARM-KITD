<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use \yii\helpers\ArrayHelper;
use \app\models\Station;
use \app\models\User;
use \app\models\Shch;

/* @var $this yii\web\View */
/* @var $model app\models\Scheme */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scheme-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'number')->textInput() ?>

    <?php //echo $form->field($model, 'id_shch')->textInput() ?>

    <?php //echo $form->field($model, 'id_shl')->textInput() ?>
    <div class="row">
        <div class="col-lg-4">

        <?= $form->field($model, 'date')->widget(DatePicker::className(), [
        'value' => '02-16-2012',
        'language'=>'ru',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>


    <?= $form->field($model, 'id_station')->dropDownList(ArrayHelper::map(Station::find()->where(['id_org'=>Yii::$app->user->identity->org])->all(),'id','name'))?>
        </div>
    </div>
    <?= $form->field($model, 'scheme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descriptin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model_shch, 'date_shl')->widget(DatePicker::className(), [
        'value' => '02-16-2012',
        'language'=>'ru',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <?= $form->field($model, 'page')->textInput(['type'=>'number','style'=>'width:80px']) ?>

    <?= $form->field($model, 'id_author')->dropDownList(ArrayHelper::map(User::find()->where(['id_org'=>Yii::$app->user->identity->id_org])->andWhere(['id_post' => 1])->all(),'id','fio'),['style'=>'width:280px'])?>

    <?php //echo $form->field($model, 'id_org')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Добавить изменение в АРМ', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
