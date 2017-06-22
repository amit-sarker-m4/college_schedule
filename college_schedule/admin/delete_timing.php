<?php
	include 'connection.php';

	$x = $_REQUEST['lecture_timing_id'];

	$result = mysql_query("DELETE FROM lecture_timing WHERE lecture_timing_id=$x");

	if($result){
		echo "<script type='text/javascript'>alert('Data has been Deleted !'); 
					 window.location.replace(\"timing.php\");
			</script>";
	}
?>