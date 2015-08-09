<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Lemon's Website</title>
	<?php include '/template/css-rqmts/link.php'; ?>
</head>
<body>
	<?php include '/template/header.php'; ?>
	<?php include '/template/mysql.php'; ?>
	<div id="content">
		<?php
			$connection = SQLUtil::connect($hostname, $database, $username, $password);
			$stmt = $connection->prepare("SELECT * FROM `animal-links`");
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach($rows as $row){
				$link = $row['link'];
				echo '<img src="' . $link . '"/>';
			}
		?>
	</div>
	<?php include '/template/footer.php'; ?>
</body>
</html>