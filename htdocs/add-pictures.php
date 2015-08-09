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
		<?php if(!isset($_GET["link"])){ ?>
			<form action="/add-pictures.php">
				<input type="text" name="link">
				<br>
				<input type="radio" name="option" value="Add" checked>Add
				<input type="radio" name="option" value="Delete">Delete
				<br>
				<input type="submit" value="Submit">
			</form>
		<?php }else{ ?>
			<p>Submitted!</p>
		<?php 
				include '/template/mysql.php';
				$connection = SQLUtil::connect($hostname, $database, $username, $password);
				if($_GET["option"]=="Add"){
					$stmt = $connection->prepare("INSERT INTO `animal-links` (link) VALUES (:link)");
				}
				if($_GET["option"]=="Delete"){
					$stmt = $connection->prepare("DELETE FROM `animal-links` WHERE link = :link");
				}
				$stmt->bindValue(':link', $_GET["link"], PDO::PARAM_STR);
				$stmt->execute();
			}
		?>
	</div>
	<?php include '/template/footer.php'; ?>
</body>
</html>