<?php

namespace app\models;
use \yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "scheme".
 *
 * @property int $id
 * @property int|null $number
 * @property string|null $date
 * @property int|null $id_station
 * @property string|null $scheme
 * @property string|null $descriptin
 * @property string|null $reason
 * @property int|null $result
 * @property int|null $page
 * @property int|null $id_author
 * @property int|null $id_org
 */
class Scheme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scheme';
    }

    public function afterSave($insert, $changedAttributes)
    {
        if($insert){
            $shch_model = new Shch();
            $shl_model = new Shl();
            $shl_model->number_scheme = $this->id;
            $shch_model->number_scheme = $this->id;
            $shl_model->save();
            $shch_model->save();
            return $this->number;
        }
        else{
            return $this->number;
        }
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'id_station', 'result', 'page', 'id_author', 'id_org'], 'integer'],
            [['date'], 'safe'],
            [['scheme', 'descriptin', 'reason'], 'string', 'max' => 255],
           // [['date'], 'date', 'format' => 'd.m.Y h:i:s'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => '№',
            'date' => 'Дата внесения изменения в АРМ',
            'id_station' => 'Станция',
            'scheme' => 'Наименование схемы',
            'descriptin' => 'Описание изменений',
            'reason' => 'Основание внесения изменений',
            'result' => 'Результат проверки',
            'page' => 'Колличество листов',
            'id_author' => 'Изменения внес',
            'id_org' => 'Организация',
            'date_utv' => 'Дата утверждения изменения',
            'date_fuck' => 'Дата внедрения (фактическая)',

        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(),['id'=>'id_author']);
    }
    public function getStation()
    {
        return $this->hasOne(Station::className(),['id'=>'id_station']);
    }
    public function getOrg()
    {
        return $this->hasOne(Org::className(),['id'=>'id_org']);
    }

    public function getShch()
    {
        return $this->hasOne(Shch::className(),['number_scheme'=>'id']);
        # code...
    }
    public function getShl()
    {
        return $this->hasOne(Shl::className(),['number_scheme'=>'id']);
        # code...
    }
    public function getListOrg()
    {
      return ArrayHelper::map(Org::find()->all(),'id','code');
      // code...
    }
}
