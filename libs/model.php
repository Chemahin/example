<?php 
	
	class Model
	{
		public static $pdo;

		public function __construct()
		{
			$dsn = 'mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8';
			self::$pdo= new PDO($dsn,DBUSER, DBPASS);
		}
	}





 ?>