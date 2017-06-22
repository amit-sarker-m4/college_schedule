<?php
	include 'connection.php';

	$x = $_REQUEST['room_id'];

	$result = mysql_query("DELETE FROM room WHERE room_id=$x");

	if($result){
		echo "<script type='text/javascript'>alert('Data has been Deleted !'); 
					 window.location.replace(\"room.php\");
			</script>";
	}
?>