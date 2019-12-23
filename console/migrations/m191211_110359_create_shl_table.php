<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shl}}`.
 */
class m191211_110359_create_shl_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shl}}', [
            'id' => $this->primaryKey(),
            'number_scheme'=>$this->integer(11),
            'date_shl'=>$this->date(),
            'result'=>$this->integer(11),
            'date_utv'=>$this->date(),
            'page_serch'=>$this->integer(11),
            'page_fix'=>$this->integer(11),
            'page_retur'=>$this->integer(11),
            'fix_serch'=>$this->integer(11),
            'date_ex_sh'=>$this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shl}}');
    }
}
