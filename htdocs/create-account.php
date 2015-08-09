<?php
	include('/system.php');
	include('/template/mysql.php');
	$connection = SQLUtil::connect($hostname, $database, $username, $password);
	$success = System::createAccount($connection, $_POST['username'], $_POST['password'], $_POST['email']);
	include('/redirect.php');
?>