<h1>Регистарция пользователя</h1>
<?php
use \yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \app\models\Org;
?>
<?php
    $form = ActiveForm::begin(['class'=>'form-horizontal'])
?>
<?= $form->field($model,'login')->textInput(['autofocus'=>true]) ?>
<?= $form->field($model,'password')->passwordInput() ?>
<?= $form->field($model,'fio')->textInput() ?>
<?= $form->field($model,'post')->dropDownList(['1'=>'ШЛ',
    '2'=>'ШЧ']) ?>
<?= $form->field($model,'org')->dropDownList(ArrayHelper::map(Org::find()->all(),'id','code'))?>
<div>
    <button type="submit" class="btn btn-primary">Добавить</button>
</div>
<?php
    ActiveForm::end();
?>