<?php

namespace app\forms;

use yii\base\Model;

class LogForm extends Model
{

    public $login;
    public $password;
    
    public function rules()
    {
        return [
           [['login', 'password'], 'required'],
           ['login', 'email'],
           ['password', 'string', 'length' => [5, 20]],
        ];
    }

    
}