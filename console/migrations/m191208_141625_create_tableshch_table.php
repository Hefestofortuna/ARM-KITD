<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tableshch}}`.
 */
class m191208_141625_create_tableshch_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tableshch}}', [
            'id' => $this->primaryKey(),
            'number_scheme' => $this->integer(11),
            'date_shch' => $this->date(),
            'number_date_protocol' => $this->string(255),
            'date_plan' => $this->date(),
            'date_fuck' => $this->date(),
            'number_date_raport' => $this->string(255),
            'cause' => $this->string(255),
            'date_scheme' => $this->date(),
            'otv' => $this->string(255),
            'ispol' => $this->string(255),
            'date_ex' => $this->date(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tableshch}}');
    }
}
