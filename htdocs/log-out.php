<?php
	session_start();
	unset($_SESSION['auth']);
	unset($_SESSION['username']);
	header('Location: ' . $_GET['redirect']);
	die();
?>