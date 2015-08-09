<?php
	class System{
		public static function createAccount($connection, $username, $password, $email){
			$stmt = $connection->prepare
				("INSERT INTO `accounts` (username, password, email) VALUES (:username, :password, :email)");
			$stmt->bindValue(':username', $username, PDO::PARAM_STR);
			$stmt->bindValue(':password', System::generateHash($password), PDO::PARAM_STR);
			$stmt->bindValue(':email', $email, PDO::PARAM_STR);
			return $stmt->execute();
		}
		public static function verifyAccount($connection, $username, $password){
			$stmt = $connection->prepare("SELECT password FROM `accounts` WHERE username = :username LIMIT 1");
			$stmt->bindValue(':username', $username, PDO::PARAM_STR);
			if(!$stmt->execute()){
				return false;
			}
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return password_verify($password, $row['password']);
		}
		public static function generateHash($password){
			return password_hash($password, PASSWORD_BCRYPT, ["cost" => 9]);
		}	
	}
?>