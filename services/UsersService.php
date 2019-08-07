<?php

namespace app\services;

use app\storage\UsersRecord;
use app\storage\AuthIdentity;

use Yii;

class UsersService 
{

	public function SaveNewUser($model){
			$hash = Yii::$app->getSecurity()->generatePasswordHash($model->password);

			$user=new UsersRecord();
			$user->name=$model->name;
			$user->login=$model->login;
			$user->hash=$hash;
			$user->save();	
	}

	public function GetUser($model){
			$user=AuthIdentity::findOne([
				'login' => $model->login,
				]);

			$hash=$user->hash;
			$password=$model->password;

			if (Yii::$app->getSecurity()->validatePassword($password, $hash)) {
				return $user;
			}
	}	
      
}