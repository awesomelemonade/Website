<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Lemon's Website</title>
	<?php include '/template/css-rqmts/link.php'; ?>
</head>
<body>
	<?php include '/template/header.php'; ?>
	<div id="content">
		<h2>Log In</h2>
		<form action="verify.php/?redirect-success=%2Findex.php&redirect-failed=%2Findex.php" method="POST">
			<p>Username: </p><input type="text" name="username"><br>
			<p>Password: </p><input type="text" name="password"><br>
			<input type="submit" value="Submit">
			<br>
		</form>
		<h2>Create Account</h2>
		<form action="create-account.php/?redirect-success=%2Findex.php&redirect-failed=%2Findex.php" method="POST">
			<p>Username: </p><input type="text" name="username"><br>
			<p>Password: </p><input type="text" name="password"><br>
			<p>Email: </p><input type="text" name="email"><br>
			<input type="submit" value="Submit">
			<br>
		</form>
	</div>
	<?php include '/template/footer.php'; ?>
</body>
</html>