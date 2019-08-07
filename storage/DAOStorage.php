<?php

namespace app\storage;

use yii\db\Connection;


class DAOStorage 
{
	
	public $connection;
	
	public function __construct(Connection $connection)
	{
		$this->connection = $connection;
		
	}

	public function findAll($field){
		$sql="SELECT * FROM {{users}} ORDER BY [[$field]]";
		return $this->connection->createCommand($sql)->queryAll();
	}
	
}