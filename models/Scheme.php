<?php

namespace app\models;

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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'result', 'page', 'id_author', 'id_org'], 'integer'],
            [['date'], 'safe'],
            [['scheme',  'id_station', 'descriptin', 'reason'], 'string', 'max' => 255],
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
            'date' => 'Дата внесения в АРМ',
            'id_station' => 'Станция',
            'scheme' => 'Наименование схемы',
            'descriptin' => 'Описание изменений',
            'reason' => 'Основание внесение изменений',
            'result' => 'Результат рповерки',
            'page' => 'Станиц',
            'id_author' => 'Автор',
            'id_org' => 'Дистанция',
        ];
    }
    public function getStation()
    {
        return $this->hasOne(Station::className(),['id'=>'id_station']);
    }
    public function getOrg()
    {
        return $this->hasOne(Org::className(),['id'=>'id_org']);
    }
}
