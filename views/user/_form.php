<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \app\models\Org;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model,'login')->textInput(['autofocus'=>true]) ?>
<?= $form->field($model,'password')->passwordInput() ?>
<?= $form->field($model,'fio')->textInput() ?>
<?= $form->field($model,'id_post')->dropDownList(['1'=>'ШЧ',
    '2'=>'ШЛ']) ?>
<?= $form->field($model,'id_org')->dropDownList(ArrayHelper::map(Org::find()->all(),'id','code'))?>

    <div class="form-group">
        <?= Html::submitButton('Зарегестрировать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
