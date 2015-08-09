<?php

$hostname = "localhost";
$database = "database";
$username = "testuser";
$password = "password";

class SQLUtil {
	public static function connect($hostname, $database, $username, $password){
		$pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		return $pdo;
	}
}
?>