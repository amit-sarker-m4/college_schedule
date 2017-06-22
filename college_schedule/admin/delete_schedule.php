<?php
	include 'connection.php';

	$x = $_REQUEST['schedule_id'];

	$result = mysql_query("DELETE FROM schedule WHERE schedule_id=$x");

	if($result){
		echo "<script type='text/javascript'>alert('Data has been Deleted !'); 
					 window.location.replace(\"schedule.php\");
			</script>";
	}
?>