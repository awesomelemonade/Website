<div id="header">
	<ul>
		<li><h1><a href="/index.php"><!--CSGO-Games-->A Website</a></h1></li>
		<li><a href="http://youtube.com" target="_blank" class="nav"><span>Youtube</span></a></li>
		<li><a href="#" class="nav"><span>Coin Toss</a></span></li>
		<li><a href="/cute-animals.php" class="nav"><span>Cute Animals</span></a></li>
		<?php if(isset($_SESSION)&&isset($_SESSION['auth'])&&$_SESSION['auth']==true){?>
			<li><a href="/add-pictures.php" class="nav"><span>Add/Delete Pictures</span></a></li>
		<?php } ?>
		<li><a href="/member-list.php" class="nav"><span>Memberlist</span></a></li>
		<li><a href="#" class="nav"><span>Forums</span></a></li>
		<li class="nav-right">
		<?php if(isset($_SESSION)&&isset($_SESSION['auth'])&&$_SESSION['auth']==true){?>
			<a href="#" class="profile-info"><span><?php echo $_SESSION['username']; ?></span></a>
			<a href="#" class="profile-info"><span>5000 credits</span></a>
			<a href="/log-out.php/?redirect=%2Findex.php" class="profile-info"><span>Log Out</span></a>
		<?php }else{ ?>
			<a href="/log-in.php" class="sign-in"><img src="http://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_small.png"></img></a>
		<?php } ?>
		</li>
	</ul>
</div>