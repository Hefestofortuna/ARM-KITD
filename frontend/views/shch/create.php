<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shch */

$this->title = 'Create Shch';
$this->params['breadcrumbs'][] = ['label' => 'Shches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
