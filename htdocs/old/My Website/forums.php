<?php
$topic = "Some Topic";
$author = "awesomelemonade";
for($x=1;$x<=100;++$x){
	if($x%3==0){
		$topic = "Topic #$x";
		$author = "awesomelemonade";
	}
	if($x%3==1){
		$topic = "\"What the fat\"";
		$author = "CloudSpace";
	}
	if($x%3==2){
		$topic = "....";
		$author = "...........";
	}
	echo '<tr>';
	echo "<td><a>$topic</a></td>";
	echo "<td><a>$author</a></td>";
	echo '<td><a>General</a></td>';
	echo '</tr>';
}
?>