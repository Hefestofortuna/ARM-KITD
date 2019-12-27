<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Инструкция пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    
    
    <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          #1 : Регистрация и авторизация
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
          Для того, чтобы использовать полный функционал АРМ-КИТД, Вам необходимо <a href="http://10.110.72.55:3490/index.php?r=site%2Fsignup">зарегестрироваться</a> и провести <a href="http://10.110.72.55:3490/index.php?r=site%2Flogin">авторизацию</a> в данном приложении.
          <br><font size="6">Пример заполнения формы регистрации:</font>
      <div class="text-xs-center">
    <img width="100%" src="/files/img/REg.jpg" class="img-thumbnail" alt="Responsive image" >
    </div>
</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
        #2 : Внесение изменений в АРМ
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        I. Внеси изменение , можно при помощи кнопки "Добавить проект", во вкладке "Главная" верхнего контекстного меню.
        <div class="text-xs-center">
            <img width="15%" src="/files/img/Add.jpg" class="img-thumbnail" alt="Responsive image" >
        </div>
        II. Далее необходимо заполнить следующую форму, для непосредственного добавления проекта в журнал "Списка изменений".
        <div class="text-xs-center">
            <img width="100%" src="/files/img/AddFix.jpg" class="img-thumbnail" alt="Responsive image" >
        </div>
    </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
        #3 : Ведение проекта
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        III. После добавления, перед Вами откроется только-что созданный проект, для его дальнейшего ведения совместно с [ШЧ<=>ШЛ]. 
        <div class="text-xs-center">
            <img width="100%" src="/files/img/main.jpg" class="img-thumbnail" alt="Responsive image" >
        </div>
      </div>
    </div>
  </div>
</div>
</div>


