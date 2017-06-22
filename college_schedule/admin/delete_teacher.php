<?php
	include 'connection.php';

	$x = $_REQUEST['teacher_id'];

	$result = mysql_query("DELETE FROM teacher WHERE teacher_id = $x");

	if($result){
		echo "<script type='text/javascript'>alert('Data has been Deleted !'); 
					 window.location.replace(\"teacher.php\");
			</script>";
	}
?>