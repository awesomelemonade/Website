<!DOCTYPE html>
<html>
<head>
	<title>Lemon's Website</title>
	<link rel="stylesheet" href="index.css" type="text/css"/>
	<link rel="stylesheet" href="template/base.css" type="text/css"/>
	<link rel="stylesheet" href="forums-menu.css" type="text/css"/>
</head>
<body>
<div id="splash"></div>
<?php
	include 'template/header.php';
?>
<div id="content">
	<div id="message">
		<h1>"I THINK I SAW SOMETHING TODAY"</h1>
	</div>
	<div id="forums">
		<h1>Forums</h1>
		<table id="topics-table">
			<tr>
				<th>Topic</th>
				<th>Author</th>
				<th>Catagory</th>
			</tr>
			<?php
				include 'forums.php';
			?>
		</table>
	</div>
</div>
<?php
	include 'template/footer.php';
?>
<div id="background"></div>
</body>
</html>