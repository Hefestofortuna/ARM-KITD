<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shch_history".
 *
 * @property int $id
 * @property int $id_shch
 * @property string $putdate
 * @property string|null $old_text
 * @property string|null $new_text
 * @property int $type
 */
class ShchHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shch_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_shch', 'putdate', 'type'], 'required'],
            [['id_shch', 'type'], 'integer'],
            [['putdate'], 'safe'],
            [['old_text', 'new_text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_shch' => 'Id Shch',
            'putdate' => 'Putdate',
            'old_text' => 'Old Text',
            'new_text' => 'New Text',
            'type' => 'Type',
        ];
    }
}
