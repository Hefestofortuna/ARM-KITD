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
            'number_scheme' => 'Номер схемы',
            'date_shl' => 'Дата поступления в ШЛ',
            'result' => 'Результат проверки',
            'date_utv' => 'Дата утверждения',
            'page_serch' => 'Количество проверенных листов',
            'page_fix' => 'Количество исправленных листов',
            'page_retur' => 'Количество возвращенных листов',
            'fix_serch' => 'Изменения проверил ШЛ',
            'date_ex_sh' => 'Дата переноса в экземпляр Ш',
        ];
    }
    public function afterSave($insert, $changedAttributes)
    {
        if($insert){
            return $this->number_scheme;
        }
        else{
            $scheme_model = Scheme::findOne(['id'=> $this->number_scheme] );
            $scheme_model->result = $this->result;
            $scheme_model->save();
            return $this->number_scheme;
        }
    }
    public function getPost()
    {
        return $this->hasOne(Result::className(), ['id'=>'result']);
    }
}
