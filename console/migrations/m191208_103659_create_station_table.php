<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%station}}`.
 */
class m191208_103659_create_station_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%station}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128),
            'id_org' => $this->string(32),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%station}}');
    }
}
