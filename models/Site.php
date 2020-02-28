<?php
/**
 * Created by PhpStorm.
 * User: Karatui
 * Date: 28.02.2020
 * Time: 13:02
 */

namespace app\models;

use Yii;
use yii\base\Model;

class Site extends Model
{

    public $date_first;
    public $date_second;

    public function rules()
    {
        return [
            [['date_first', 'date_second'], 'string', 'max' => 128],
        ];
    }

    public function attributeLabels()
    {
        return [
            'date_first' => 'Первое',
            'date_second' => 'Второе',
        ];
    }


}