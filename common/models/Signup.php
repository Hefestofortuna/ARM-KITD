<?php
namespace common\models;

use yii\base\Model;

class Signup extends Model
{
    public $login;
    public $password;
    public $fio;
    public $post;
    public $org;

    public function rules()
    {
        return [
            [['login','password','fio','post','org'], 'required'],
            ['login', 'unique', 'targetClass'=>'common\models\User'],
            ['password','string','min'=>5,'max'=>10],
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->login = $this->login;
        $user->password = $this->password;
        $user->fio = $this->fio;
        $user->post = $this->post;
        $user->org = $this->org;
        return $user->save();
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'fio' => 'ФИО',
            'post' => 'Должность',
            'org' => 'Организация',
        ];
    }

}