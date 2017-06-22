<?php
	include 'connection.php';
	$sql=mysql_query("select * from request where status='requested' ");
	$comment_count=mysql_num_rows($sql);
	if($comment_count!=0){
		echo '<span id="mes">'.$comment_count.'</span>';
	}
?>