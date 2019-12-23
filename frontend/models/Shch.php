<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shch".
 *
 * @property int $id
 * @property int|null $number_scheme
 * @property string|null $date_shch
 * @property string|null $number_date_protocol
 * @property string|null $date_plan
 * @property string|null $date_fuck
 * @property string|null $number_date_raport
 * @property string|null $couse
 * @property string|null $date_scheme
 * @property string|null $otv
 * @property string|null $ispol
 * @property string|null $date_ex
 */
class Shch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number_scheme'], 'integer'],
            [['date_shch', 'date_plan', 'date_fuck', 'date_scheme', 'date_ex'], 'safe'],
            [['number_date_protocol', 'number_date_raport', 'couse', 'otv', 'ispol'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number_scheme' => 'Номер схемы',
            'date_shch' => 'Дата поступления в ШЧ утвержденных изменений',
            'number_date_protocol' => '№ и дата протокола',
            'date_plan' => 'Плановая дата внедрения',
            'date_fuck' => 'Фактическая дата внедрения',
            'number_date_raport' => '№ и дата рапорта на перенос',
            'couse' => 'Причины не внедрения',
            'date_scheme' => 'Дата выдачи схем для монтажа',
            'otv' => 'Должность, ФИО отвественного',
            'ispol' => 'Должность, ФИО исполнителя',
            'date_ex' => 'Дата переноса в экземпляр участка',
        ];
    }
}
