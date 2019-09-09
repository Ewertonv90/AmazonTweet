<?php

namespace App;

class Connection {

	public static function getDb(){

		$driver = "mysql:host=localhost;";

		$database = "dbname=twitter_clone;charset=utf8";

		$user = "root";

		$password = "";

		try{

			$conn = new \PDO($driver.$database ,$user,$password);

			return $conn;

		}catch(\PDOExcepition $e){

		}
	}

}

?>