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
		<ul>
			<?php
				include '/template/mysql.php';
				$connection = SQLUtil::connect($hostname, $database, $username, $password);
				$stmt = $connection->prepare("SELECT username FROM accounts");
				$stmt->execute();
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach($rows as $row){
					echo '<li>' . $row['username'] . '</li>';
				}
			?>
		</ul>
	</div>
	<?php include '/template/footer.php'; ?>
</body>
</html>