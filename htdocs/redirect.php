<?php
	if($success){
		header('Location: ' . $_GET['redirect-success']);
	}else{
		header('Location: ' . $_GET['redirect-failed']);
	}
	die();
?>