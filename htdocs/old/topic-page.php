<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/template/base.css" type="text/css"/>
	<link rel="stylesheet" href="/topic-page.css" type="text/css"/>
</head>
<body>
<?php
	include 'template/mysql.php';
	include 'template/header.php';
?>
<div id="content">
	<div id="topic">
		<?php
			$connection = SQLUtil::connect($hostname, $database, $username, $password);
			if(isset($_GET['id'])&&!empty($_GET['id'])){
				$threadId = $_GET['id'];
				$statement = $connection->prepare('SELECT title, catagory FROM threads WHERE id=?');
				$statement->bindParam(1, $threadId, PDO::PARAM_INT);
				$statement->execute();
				if($statement->rowCount()==0){
					echo 'Topic does not exist!';
				}else{
					$row = $statement->fetch(PDO::FETCH_ASSOC);
					$threadTitle = $row['title'];
					$threadCatagoryId = $row['catagory'];
					$stmt = $connection->prepare('SELECT name, color, parent FROM catagories WHERE id=?');
					$stmt->bindParam(1, $threadCatagoryId, PDO::PARAM_INT);
					$stmt->execute();
					$r = $stmt->fetch(PDO::FETCH_ASSOC);
					$threadCatagory = $r['name'];
					$threadCatagoryColor = $r['color'];
					$threadCatagoryParentId = $r['parent'];
		?>
		<div id="head">
			<?php
				echo '<h2 class="topic-title">' . $threadTitle . '</h2>';
				echo '<a href="' . '#' . '" class="topic-catagory" style=' . "'background-color: #" . $threadCatagoryColor . "'>" . $threadCatagory . '</a>' . "\n";
				while($threadCatagoryParentId!=null){
					$threadCatagoryId = $threadCatagoryParentId;
					$stmt->execute();
					$r = $stmt->fetch(PDO::FETCH_ASSOC);
					$threadCatagory = $r['name'];
					$threadCatagoryColor = $r['color'];
					$threadCatagoryParentId = $r['parent'];
					echo '<a href="' . '#' . '" class="topic-catagory" style=' . "'background-color: #" . $threadCatagoryColor . "'>" . $threadCatagory . '</a>' . "\n";
				}
			?>
		</div>
		<?php
					$postStmt = $connection->prepare('SELECT user, text FROM posts WHERE thread=? ORDER BY post ASC');
					$postStmt->bindParam(1, $threadId, PDO::PARAM_INT);
					$postStmt->execute();
					$rows = $postStmt->fetchAll(PDO::FETCH_ASSOC);
					$userStmt = $connection->prepare('SELECT username FROM users WHERE id=?');
					$userStmt->bindParam(1, $postUser, PDO::PARAM_INT);
					foreach($rows as $row){
						$postUser = $row['user'];
						$postText = $row['text'];
						$userStmt->execute();
						$r = $userStmt->fetch(PDO::FETCH_ASSOC);
						$postUserName = $r['username'];
						echo '<div class="post">';
							echo '<div class="post-pic" style=' . "'background-image: url(" . '"/res/avatars/' . $postUserName . '-avatar.png")' . "'" . '></div>';
							echo '<div class="post-detail">';
								echo '<a href="#" class="post-user">' . $postUserName . '</a>';
								echo '<p>' . $postText . '</p>';
							echo '</div>';
						echo '</div>';
					}
				}
			}else{
				echo "Did not specify topic!";
			}
		?>
		<!--<div id="head">
			<h2 class="topic-title">Forums Need Improvement!</h2>
			<a href="#" class="topic-catagory" style='background-color: red'>Capture The Flag</a>
			<a href="#" class="topic-catagory" style='background-color: red'>CTF Discussion</a>
		</div>
		<div class="post">
			<div class="post-pic" style='background-image: url("/res/Newp.jpg")'></div>
			<div class="post-detail">
				<a href="#" class="post-author">awesomelemonade</a>
				<p>Lorem ipsum dolor sit amet, est malis nobis in. Eam vivendum reformidans no, vel et malis prompta, no dolor nostro vix. No sit duis liber delenit, ad choro tamquam feugait pri. Tibique dolores constituam sed ei, duo aliquid mentitum an. Eos amet scripta meliore in. Te pro nostrud recusabo consulatu, purto sanctus oportere vix ad, eam et solum tollit commune. Nec aperiam verterem voluptatum in, vel verear animal eu. Iuvaret ornatus dolorum eam eu, his nulla sanctus menandri an. No modus indoctum volutpat mea. An eos liber maiorum, sea no possit tamquam accusata, pro eruditi philosophia te. An suas pertinax ocurreret ius, ei eam rebum similique, habemus expetenda delicatissimi quo ad. Usu paulo impedit democritum ad, ut dicat appellantur eos, nam an meis graeco facilisis. Usu erat solum interpretaris ne. Illum veniam ex eos, vis no zril dictas detraxit, at labore evertitur eam. Ne eum minim ancillae, in pri soluta accusam ullamcorper, lorem homero verear an has. Ei quo nibh error dicant, his ei odio affert dolores. Sit ea sumo prompta, salutatus tincidunt sententiae ius ne, et illum oblique platonem cum. Vim quod brute neglegentur cu. Ullum errem nullam nam ut, ex mel natum omnes primis, qui salutandi abhorreant an. Ne nam dolores detraxit. Pri paulo ludus probatus eu, et eam solum debet sensibus. Tamquam suavitate euripidis ei has, eu munere audiam philosophia nec. Eum cu tale zril delenit. Ius id idque facer pertinax. Ut sint saepe consul cum, saepe omnesque aliquando ius id. </p>
			</div>
		</div>
		<div class="post">
			<div class="post-pic" style='background-image: url("/res/Newp.jpg")'></div>
			<div class="post-detail">
				<a href="#" class="post-author">awesomelemonade</a>
				<p>Lorem ipsum dolor sit amet, est malis nobis in. Eam vivendum reformidans no, vel et malis prompta, no dolor nostro vix. No sit duis liber delenit, ad choro tamquam feugait pri. Tibique dolores constituam sed ei, duo aliquid mentitum an. Eos amet scripta meliore in. Te pro nostrud recusabo consulatu, purto sanctus oportere vix ad, eam et solum tollit commune. Nec aperiam verterem voluptatum in, vel verear animal eu. Iuvaret ornatus dolorum eam eu, his nulla sanctus menandri an. No modus indoctum volutpat mea. An eos liber maiorum, sea no possit tamquam accusata, pro eruditi philosophia te. An suas pertinax ocurreret ius, ei eam rebum similique, habemus expetenda delicatissimi quo ad. Usu paulo impedit democritum ad, ut dicat appellantur eos, nam an meis graeco facilisis. Usu erat solum interpretaris ne. Illum veniam ex eos, vis no zril dictas detraxit, at labore evertitur eam. Ne eum minim ancillae, in pri soluta accusam ullamcorper, lorem homero verear an has. Ei quo nibh error dicant, his ei odio affert dolores. Sit ea sumo prompta, salutatus tincidunt sententiae ius ne, et illum oblique platonem cum. Vim quod brute neglegentur cu. Ullum errem nullam nam ut, ex mel natum omnes primis, qui salutandi abhorreant an. Ne nam dolores detraxit. Pri paulo ludus probatus eu, et eam solum debet sensibus. Tamquam suavitate euripidis ei has, eu munere audiam philosophia nec. Eum cu tale zril delenit. Ius id idque facer pertinax. Ut sint saepe consul cum, saepe omnesque aliquando ius id. </p>
			</div>
		</div>
		<div class="post">
			<div class="post-pic" style='background-image: url("/res/Newp.jpg")'></div>
			<div class="post-detail">
				<a href="#" class="post-author">awesomelemonade</a>
				<p>Lorem ipsum dolor sit amet, est malis nobis in. Eam vivendum reformidans no, vel et malis prompta, no dolor nostro vix. No sit duis liber delenit, ad choro tamquam feugait pri. Tibique dolores constituam sed ei, duo aliquid mentitum an. Eos amet scripta meliore in. Te pro nostrud recusabo consulatu, purto sanctus oportere vix ad, eam et solum tollit commune. Nec aperiam verterem voluptatum in, vel verear animal eu. Iuvaret ornatus dolorum eam eu, his nulla sanctus menandri an. No modus indoctum volutpat mea. An eos liber maiorum, sea no possit tamquam accusata, pro eruditi philosophia te. An suas pertinax ocurreret ius, ei eam rebum similique, habemus expetenda delicatissimi quo ad. Usu paulo impedit democritum ad, ut dicat appellantur eos, nam an meis graeco facilisis. Usu erat solum interpretaris ne. Illum veniam ex eos, vis no zril dictas detraxit, at labore evertitur eam. Ne eum minim ancillae, in pri soluta accusam ullamcorper, lorem homero verear an has. Ei quo nibh error dicant, his ei odio affert dolores. Sit ea sumo prompta, salutatus tincidunt sententiae ius ne, et illum oblique platonem cum. Vim quod brute neglegentur cu. Ullum errem nullam nam ut, ex mel natum omnes primis, qui salutandi abhorreant an. Ne nam dolores detraxit. Pri paulo ludus probatus eu, et eam solum debet sensibus. Tamquam suavitate euripidis ei has, eu munere audiam philosophia nec. Eum cu tale zril delenit. Ius id idque facer pertinax. Ut sint saepe consul cum, saepe omnesque aliquando ius id. </p>
			</div>
		</div>-->
	</div>
</div>
<?php
	include 'template/footer.php';
?>
<div id="background"></div>
</body>
</html>