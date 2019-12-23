<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\Station;

/* @var $this yii\web\View */
/* @var $model app\models\Scheme */

$this->title = $model->scheme;
//$this->params['breadcrumbs'][] = ['label' => 'Schemes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="scheme-view">

    <h1><?= Html::encode($this->title . " с номером изменения: " . $model->number) ?></h1>
    

    <p>
        <?php// Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
    <div class="row">
                    <div class="col-md-4">
                    <div class="panel panel-danger">
                        <ul class="list-group">
                        <li class="list-group-item list-group-item-danger">Информация от ШЧ</li>
                        <li class="list-group-item"><?= Html::encode("Дата поступления в ШЧ утвержденных изменений: " . $model->shch->date_shch) ?></li>
                        <li class="list-group-item"><?= Html::encode("№ и дата протокола: " . $model->shch->number_date_protocol) ?></li> 
                        <li class="list-group-item"><?= Html::encode("Плановая дата внедрения: " . Yii::$app->formatter->asDate($model->shch->date_plan , 'dd.MM.yyyy')) ?></li> 
                        <li class="list-group-item"><?= Html::encode("Фактическая дата внедрения: " . Yii::$app->formatter->asDate($model->shch->date_fuck , 'dd.MM.yyyy')) ?></li> 
                        <li class="list-group-item"><?= Html::encode("№ и дата рапорта на перенос: " . $model->shch->number_date_raport) ?></li> 
                        <li class="list-group-item"><?= Html::encode("Причины не внедрения: " . $model->shch->couse) ?></li>  
                        <li class="list-group-item"><?= Html::encode("Дата выдачи схем для монтажа: " . $model->shch->date_scheme) ?></li>  
                        <li class="list-group-item"><?= Html::encode("Должность, ФИО отвественного: " . $model->shch->otv) ?></li>  
                        <li class="list-group-item"><?= Html::encode("Должность, ФИО исполнителя: " . $model->shch->ispol) ?></li> 
                        <li class="list-group-item"><?= Html::encode("Дата переноса в экземпляр участка: " . Yii::$app->formatter->asDate($model->shch->date_ex, 'dd.MM.yyyy')) ?></li> 
                        <li class="list-group-item"><?= Yii::$app->user->identity->post != "2" ? Html::a('Изменить', ['/shch/update','id' => $model->shch->id], ['class' => 'btn btn-primary']) : Html::label('Редактирование запрещено') ?></li> 
                        </ul>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="panel panel-success">
                        <ul class="list-group">
                        <li class="list-group-item list-group-item-success">Информация от ШЛ</li>
                        <li class="list-group-item"><?= Html::encode("Дата поступления в ШЛ: " . Yii::$app->formatter->asDate($model->shl->date_shl, 'dd.MM.yyyy')) ?></li>
                        <li class="list-group-item">Результат проверки: <?= Html::encode($model->shl->result != 1 ? 'Опровергнуто' : 'Согласованно') ?></li>
                        <li class="list-group-item"><?= Html::encode("Дата утверждения: " . Yii::$app->formatter->asDate($model->shl->date_utv, 'dd.MM.yyyy')) ?></li>
                        <li class="list-group-item"><?= Html::encode("Колличество проверенных листов: " . $model->shl->page_serch) ?></li>
                        <li class="list-group-item"><?= Html::encode("Колличество исправленных листов: " . $model->shl->page_fix) ?></li>
                        <li class="list-group-item"><?= Html::encode("Колличество возвращенных листов: " . $model->shl->page_retur) ?></li>
                        <li class="list-group-item"><?= Html::encode("Изменения проверил ШЛи: " . $model->shl->fix_serch) ?></li>
                        <li class="list-group-item"><?= Html::encode("Дата переноса в экземпляр Ш: " . Yii::$app->formatter->asDate($model->shl->date_ex_sh, 'dd.MM.yyyy')) ?></li>
                        <li class="list-group-item"><?= Yii::$app->user->identity->post != "1" ? Html::a('Изменить', ['/shl/update','id' => $model->shl->id], ['class' => 'btn btn-primary']) : Html::label('Редактирование запрещено') ?></li> 
                        </ul>
                    </div>
                    </div>
                    
        <div class="col-md-4">
        <div class="panel panel-primary">
        <ul class="list-group">
        <li class="list-group-item active">Основная информация</li>
        <li class="list-group-item"><?= Html::encode("Дата внесения изменения в АРМ : " . Yii::$app->formatter->asDate($model->date, 'dd.MM.yyyy')) ?></li>
        <li class="list-group-item"><?= Html::encode("Станция : " . $model->station->name) ?></li>
        <li class="list-group-item"><?= Html::encode("Наименование схемы : " . $model->scheme) ?></li>
        <li class="list-group-item"><?= Html::encode("Описание изменений : " . $model->descriptin) ?></li>
        <li class="list-group-item"><?= Html::encode("Основание внесения изменений : " . $model->reason) ?></li>
        <li class="list-group-item">Результат проверки: <?= Html::encode($model->result != 1 ? 'Опровергнуто' : 'Согласованно') ?></li>
        <li class="list-group-item"><?= Html::encode("Колличство страниц: " . $model->page) ?></li>
        <li class="list-group-item"><?= Html::encode("Изменения внес : " . $model->user->fio) ?></li>
        <li class="list-group-item">
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот проект?',
                'method' => 'post',
            ],
        ]) ?>
        </li>
        </ul>
        </div>
        </div>
                
    </div>
    <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-warning">
                            <ul class="list-group">                            
                            <ul class="list-group">
                            <li class="list-group-item list-group-item-warning"><h3>В разработке</h3></li>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <ul class="list-group">                            
                            <ul class="list-group">
                            <li class="list-group-item list-group-item-info"><h3>В разработке</h3></li>
                        </div>
                    </div>
                </div>
</div>

