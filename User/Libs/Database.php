<?php

class Database extends PDO
{
	
	public function __construct()
	{
            define('DB_ENCODING', 'utf8');
		parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS ,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
//                ,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	}
	
	
}