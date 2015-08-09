<!DOCTYPE html>
<html>
<head>
	<title>Lemon's Website</title>
	<link rel="stylesheet" href="/template/base.css" type="text/css"/>
	<link rel="stylesheet" href="/topics.css" type="text/css"/>
	<link rel="stylesheet" href="/bottom-menu.css" type="text/css"/>
</head>
<body>
<div id="wrapper">
	<?php
		include 'template/mysql.php';
	?>
	<div id="forum-wrapper">
		<?php
			include 'template/header.php';
		?>
		<div id="content">
			<div id="forums">
				<div id="topics">
					<?php
						$connection = SQLUtil::connect($hostname, $database, $username, $password);
						$userStmt = $connection->prepare("SELECT username FROM users WHERE id=?");
						$userStmt->bindParam(1, $threadUserId, PDO::PARAM_INT);
						$catagoryStmt = $connection->prepare("SELECT name, color FROM catagories WHERE id=?");
						$catagoryStmt->bindParam(1, $threadCatagoryId, PDO::PARAM_INT);
						$statement = $connection->prepare("SELECT * FROM threads LIMIT ?, ?");
						$statement->bindParam(1, $temp=0, PDO::PARAM_INT);
						$statement->bindParam(2, $temp=30, PDO::PARAM_INT);
						$statement->execute();
						$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
						foreach($rows as $row){
							$threadId = $row['id'];
							$threadTitle = $row['title'];
							$threadCatagoryId = $row['catagory'];
							$threadUserId = $row['user'];
							$threadStatus = $row['status'];
							$userStmt->execute();
							$r = $userStmt->fetch(PDO::FETCH_ASSOC);
							$threadUser = $r['username'];
							$catagoryStmt->execute();
							$r = $catagoryStmt->fetch(PDO::FETCH_ASSOC);
							$threadCatagory = $r['name'];
							$threadCatagoryColor = $r['color'];
					?>	
							<div class="topic">
								<?php
									echo '<div class="topic-pic" style=' . "'background-image: url(" . '"/res/topic-pics/'. $threadStatus . ".png" . '"' . ");'></div>";
								?>
								<div class="topic-info">
									<div class="topic-head">
										<?php
											echo '<a href="/forums/topic/' . $threadId . '/" class="topic-title">' . $threadTitle . '</a><br/>';
											echo '<a href="#" class="topic-user">' . $threadUser . '</a>'
										?>
									</div>
									<div class="topic-detail">
										<?php
											echo '<a href="#" class="topic-catagory" style="background-color: #' . $threadCatagoryColor . '">' . $threadCatagory . '</a><br/>';
											echo '<p class="topic-time">' . '3 days ago' . '</p>';
										?>
									</div>
								</div>
							</div>
					<?php
						}
					?>
					<!--<div class="topic">
						<div class="topic-pic" style="background-image: url(http://www.clickhdwallpapers.com/wp-content/uploads/2015/01/Wallpaper_For_Desktop_Background-image.jpg);"></div>
						<div class="topic-info">
							<div class="topic-head">
								<a href="/forums-page.php" class="topic-title">Forums Need Improvement!</a><br/>
								
								<a href="#" class="topic-author">awesomelemonade</a>
							</div>
							<div class="topic-detail">
								<a href="#" class="topic-catagory" style='background-color: red'>CTF Discussion</a><br/>
								<p class="topic-time">3 days ago</p>
							</div>
						</div>
					</div>
					<div class="topic">
						<div class="topic-pic" style="background-image: url(http://www.clickhdwallpapers.com/wp-content/uploads/2015/01/Wallpaper_For_Desktop_Background-image.jpg);"></div>
						<div class="topic-info">
							<div class="topic-head">
								<a href="#" class="topic-title">Gr8 B8 M8</a><br/>
								<a href="#" class="topic-author">awesomelemonade</a>
							</div>
							<div class="topic-detail">
								<a href="#" class="topic-catagory">Off-Topic</a><br/>
								<p class="topic-time">8 days ago</p>
							</div>
						</div>
					</div>
					<div class="topic">
						<div class="topic-pic" style='background-image: url("/res/Eye.jpg");'></div>
						<div class="topic-info">
							<div class="topic-head">
								<a href="#" class="topic-title">What the fat..</a><br/>
								<a href="#" class="topic-author">CloudSpace</a>
							</div>
							<div class="topic-detail">
								<a href="#" class="topic-catagory">General</a><br/>
								<p class="topic-time">a few seconds ago</p>
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</div>
		<?php
			include 'template/footer.php';
		?>
	</div>
</div>
<div id="bottom-wrapper">
	<div id="create">
		<form id="form">
			<div class="section">
				<p class="label">Title:</p>
				<input id="title-field" type="text" name="Text Field"></input>
			</div>
			<textarea id="post-area">A Test Text Area...</textarea>
		</form>
	</div>
	<div id="bottom-menu">
		<div id="account-section">
			<div id="account-info">
				<a id="account-name" href="#">awesomelemonade</a>
				<p id="info-count">5 topics | 12 posts</p>
				<a id="sign-out" href="#" class="button">Sign Out &#8594;</a>
			</div>
		</div>
		<div id="toolbar">
			<a href="#" id="back">&#8595;</a>
			<a href="#create" id="create-topic">Create Topic</a>
		</div>
	</div>
</div>
<div id="background"></div>
</body>
</html>