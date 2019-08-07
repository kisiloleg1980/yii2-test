<?php

namespace app\storage;

use yii\web\IdentityInterface;


class AuthIdentity extends UsersRecord implements IdentityInterface
{
  

	 public static function findIdentity($id)
     {
          return static::findOne($id);
     }
 
      public static function findIdentityByAccessToken($token, $type = null)
      {
          //return static::findOne(['access_token' => $token]);
      }
 
      public function getId()
      {
          return $this->id;
      }
 
      public function getAuthKey()
      {
        // echo "string";
        // die();
         //return $this->authKey;
      }
 
      public function validateAuthKey($authKey)
      {
          //return $this->authKey === $authKey;
      }
	
}