<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "station".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $id_org
 */
class Station extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'station';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 128],
            [['id_org'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Станция',
            'id_org' => 'Id Org',
        ];
    }
}
