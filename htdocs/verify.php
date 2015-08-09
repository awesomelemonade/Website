<?php
	include('/system.php');
	include('/template/mysql.php');
	$connection = SQLUtil::connect($hostname, $database, $username, $password);
	$success = System::verifyAccount($connection, $_POST['username'], $_POST['password']);
	if($success){
		session_start();
		$_SESSION['auth'] = true;
		$_SESSION['username'] = $_POST['username'];
	}
	include('/redirect.php');
?>