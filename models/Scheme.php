<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scheme".
 *
 * @property int $id
 * @property int|null $number
 * @property int|null $id_shch
 * @property int|null $id_shl
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
            [['number', 'id_shch', 'id_shl', 'id_station', 'result', 'page', 'id_author', 'id_org'], 'integer'],
            [['date'], 'safe'],
            [['scheme', 'descriptin', 'reason'], 'string', 'max' => 756],
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
            'id_shch' => 'Дата внедрения (фактическая)',
            'id_shl' => 'Дата утверждения изменения',
            'date' => 'Дата внесения изменения в АРМ',
            'id_station' => 'Станция',
            'scheme' => 'Наименование схемы',
            'descriptin' => 'Описание изменений',
            'reason' => 'Основание внесения изменений',
            'result' => 'Результат проверки',
            'page' => 'Количество листов',
            'id_author' => 'Изменения внес ШЧ',
            'id_org' => 'Дитанция',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(),['id'=>'id_author']);
    }

    public function getStation()
    {
        return $this->hasOne(Station::className(), ['id'=>'id_station']);
    }

    public function getOrg()
    {
        return $this->hasOne(Org::className(), ['id'=>'id_org']);
    }

    public function getShch()
    {
        return $this->hasOne(Shch::className(), ['id'=>'id_shch']);
    }

    public function getShl()
    {
        return $this->hasOne(Shl::className(), ['id'=>'id_shl']);
    }

    public function getShch_history()
    {
        return $this->hasOne(ShchHistory::className(), ['id'=>'id_shch']);
    }

}
