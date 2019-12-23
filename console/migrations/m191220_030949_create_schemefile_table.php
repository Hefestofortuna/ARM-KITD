<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schemefile}}`.
 */
class m191220_030949_create_schemefile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schemefile}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%schemefile}}');
    }
}
