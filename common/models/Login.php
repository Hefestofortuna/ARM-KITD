<?php

namespace common\models;

use yii\base\Model;

class Login extends Model
{

    public $login;
    public $password;
    public $fio;
    public $post;
    public $org;

    public function rules()
    {
        return [
            [['login','password'], 'required'],
            ['password','validatePassword']
        ];
    }


    public function validatePassword($attribute, $params){
        if(!$this->hasErrors())
        {
            $user = $this->getUser();
            if(!$user || ($user->password != $this->password))
            {
                $this->addError($attribute,'Ошибка авторизации');
            }
        }

    }
    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }
    public function getUser()
    {
        return User::findOne(['login'=>$this->login]);
    }
}