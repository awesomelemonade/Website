<?php

$hostname = "localhost";
$database = "database";
$username = "testuser";
$password = "password";

class SQLUtil {
	public static function connect($hostname, $database, $username, $password){
		$pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
		return $pdo;
	}
	public static function beginTransaction($database){
		$database->beginTransaction();
	}
	public static function commit($database){
		$database->commit();
	}
	public static function rollBack($database){
		$database->rollBack();
	}
}
?>