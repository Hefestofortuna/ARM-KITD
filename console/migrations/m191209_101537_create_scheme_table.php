<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%scheme}}`.
 */
class m191209_101537_create_scheme_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%scheme}}', [
            'id' => $this->primaryKey(),
            'number' => $this->integer(11),
            'date' => $this->date(),
            'id_station' => $this->integer(11),
            'scheme' => $this->string(255),
            'descriptin' => $this->string(255),
            'reason' => $this->string(255),
            'result' => $this->integer(11),
            'page' => $this->integer(11),
            'id_author' => $this->integer(11),
            'id_org' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%scheme}}');
    }
}
