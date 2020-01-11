<?php

use yii\helpers\Html;
use \app\models\Scheme;

/* @var $this yii\web\View */
/* @var $model app\models\Scheme */

$this->title = 'Добавление изменения с номером : ' . (Scheme::find()->where(['id_org'=>Yii::$app->user->identity->org])->max('number') + 1);
//$this->params['breadcrumbs'][] = ['label' => 'Schemes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scheme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
