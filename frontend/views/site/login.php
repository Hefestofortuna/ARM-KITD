<?php

use yii\widgets\ActiveForm;

?>
<div class="site-login">
    <h1>Авторизация</h1>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($login_model, 'login')->textInput(['autofocus' => true]) ?>

                <?= $form->field($login_model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <button class="btn btn-success">Войти</button>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
