<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shl".
 *
 * @property int $id
 * @property int|null $number_scheme
 * @property string|null $date_shl
 * @property int|null $result
 * @property string|null $date_utv
 * @property int|null $page_serch
 * @property int|null $page_fix
 * @property int|null $page_retur
 * @property int|null $fix_serch
 * @property string|null $date_ex_sh
 */
class Shl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number_scheme', 'result', 'page_serch', 'page_fix', 'page_retur', 'fix_serch'], 'integer'],
            [['date_shl', 'date_utv', 'date_ex_sh'], 'safe'],
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
            'date_shl' => 'Date Shl',
            'result' => 'Result',
            'date_utv' => 'Date Utv',
            'page_serch' => 'Page Serch',
            'page_fix' => 'Page Fix',
            'page_retur' => 'Page Retur',
            'fix_serch' => 'Fix Serch',
            'date_ex_sh' => 'Date Ex Sh',
        ];
    }
}
