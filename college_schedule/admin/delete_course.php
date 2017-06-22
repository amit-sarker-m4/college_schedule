<?php
	include 'connection.php';

	$x = $_REQUEST['course_id'];

	$result = mysql_query("DELETE FROM course WHERE course_id = $x");

	if($result){
		echo "<script type='text/javascript'>alert('Data has been Deleted !'); 
					 window.location.replace(\"course.php\");
			</script>";
	}
?>