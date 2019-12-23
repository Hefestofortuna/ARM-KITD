<?php

use yii\db\Migration;

/**
 * Class m191207_154926_create_org_tabel
 */
class m191207_154926_create_org_tabel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%org}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'code' => $this->string(16),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

}
