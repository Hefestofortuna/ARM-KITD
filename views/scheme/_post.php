<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">

    <?php
    $value =[
            'Дата поступления в ШЧ утвержденных изменений',
            '№ и дата протокола внедрения утвержденных изменений',
            'Плановая дата внедрения изменений',
            'Фактическая дата внедрения изменений',
            'Дата отправления в ШЛ',
            '№ и дата рапорта на перенос невнедренных изменений',
    ];
    switch ($model->type){
        case 1:
            echo '<tr class="active">';
            break;
        case 2:
            echo '<tr class="active">';
            break;
        case 3:
            echo '<tr class="danger">';
            break;
        case 4:
            echo '<tr class="danger">';
            break;
        case 5:
            echo '<tr class="warning">';
            break;
        case 6:
            echo '<tr class="danger">';
            break;
    }
    ?>
            <td><?= $model->putdate?></td>
            <td><?= $value[($model->type) - 1]?></td>
            <td><?= $model->old_text?></td>
            <td><?= $model->new_text?></td>
        </tr>
</div>