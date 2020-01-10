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
 * @property string|null $date_shl
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
            [['date_shch', 'date_plan', 'date_fuck', 'date_shl', 'date_scheme', 'date_ex'], 'safe'],
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
            'number_scheme' => 'Number Scheme',
            'date_shch' => 'Date Shch',
            'number_date_protocol' => 'Number Date Protocol',
            'date_plan' => 'Date Plan',
            'date_fuck' => 'Дата внедрения (фактическая)',
            'date_shl' => 'Date Shl',
            'number_date_raport' => 'Number Date Raport',
            'couse' => 'Couse',
            'date_scheme' => 'Date Scheme',
            'otv' => 'Otv',
            'ispol' => 'Ispol',
            'date_ex' => 'Date Ex',
        ];
    }
}
