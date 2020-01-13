<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shl */

$this->title = 'Create Shl';
$this->params['breadcrumbs'][] = ['label' => 'Shls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
