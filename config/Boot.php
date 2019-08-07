<?php


namespace app\config;

use yii;
use yii\base\BootstrapInterface;
use yii\di\Container;
use app\storage\DAOStorage;


class Boot implements BootstrapInterface{
    
    public function bootstrap($app){
       
        $container = \Yii::$container;

        $container->set('app\storage\DAOStorage', function() {
            return new DAOStorage(Yii::$app->db);
        });            
	}
    
}