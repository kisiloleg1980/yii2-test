<?php

namespace app\services;

use Yii;
use app\storage\DAOStorage;

use yii\helpers\VarDumper;

class ListUsersService 
{

	private $storage;

	public function __construct(DAOStorage $storage){
			$this->storage=$storage;
		}	
     
    public function GetListUsers($field){
    	return	$this->storage->findAll($field);
    }  
}