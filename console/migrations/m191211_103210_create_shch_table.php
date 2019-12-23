<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shch}}`.
 */
class m191211_103210_create_shch_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shch}}', [
            'id' => $this->primaryKey(),
            'number_scheme'=>$this->integer(11),
            'date_shch'=>$this->date(),
            'number_date_protocol'=>$this->string(255),
            'date_plan'=>$this->date(),
            'date_fuck'=>$this->date(),
            'number_date_raport'=>$this->string(255),
            'couse'=>$this->string(255),
            'date_scheme'=>$this->date(),
            'otv'=>$this->string(255),
            'ispol'=>$this->string(255),
            'date_ex'=>$this->date(),
            //'number_scheme'=>$this=>integer(11),
            //'date_shl'=>$this->date(),
            //'result'=>$this=>integer(11),
            //'date_utv'=>$this->date(),
            //'page_serch'=>integer(11);
            //'page_fix'=>integer(11);
            //'page_retur'=>integer(11);
            //'fix_serch'=>integer(11);
            //'date_ex_sh'=>integer(11);
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shch}}');
    }
}
