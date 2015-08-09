<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Lemon's Website</title>
	<?php include '/template/css-rqmts/link.php'; ?>
	<link rel="stylesheet" href="/index.css" type="text/css"/>
</head>
<body>
	<?php include '/template/header.php'; ?>
	<div id="content">
		<script src="test.js" type="text/javascript"></script>
		<?php
			include '/system.php';
			//include '/template/mysql.php';
			//$connection = SQLUtil::connect($hostname, $database, $username, $password);
			//System::createAccount($connection, "testuser", "password", "aRandyEmail");
			//echo 'Checking: ' . System::verifyAccount($connection, "testuasdfser", "password");
		?>
	</div>
	<?php include '/template/footer.php'; ?>
</body>
</html>