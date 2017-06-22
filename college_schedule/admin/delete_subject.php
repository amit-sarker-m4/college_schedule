<?php
	include 'connection.php';

	$x = $_REQUEST['subject_id'];

	$result = mysql_query("DELETE FROM subject WHERE subject_id = $x");

	if($result){
		echo "<script type='text/javascript'>alert('Data has been Deleted !'); 
					 window.location.replace(\"subject.php\");
			</script>";
	}
?>