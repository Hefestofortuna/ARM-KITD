<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string(64),
            'password' => $this->string(64),
            'fio' => $this->string(64),
            'post' => $this->string(16),
            'org' => $this->string(16),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
