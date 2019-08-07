<?php

namespace app\forms;

use yii\base\Model;


class RegForm extends Model
{
    public $name;
    public $login;
    public $password;
    public $verifyCode;
    
    public function rules()
    {
        return [
           [['name', 'login', 'password'], 'required'],
           ['name', 'string', 'length' => [5, 20]],
           ['login', 'email'],
           ['password', 'string', 'length' => [5, 20]],
           ['verifyCode', 'captcha', 'captchaAction'
                => 'site/captcha']
        ];
    }

    
}
