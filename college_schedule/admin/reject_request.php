<?php

	include 'connection.php';


	if(isset($_GET['request_id'])){
		$request_id = $_GET['request_id'];

		
		$insert = mysql_query("UPDATE request SET status='rejected' WHERE request_id='$request_id' ");
		
		if($insert){
			
			echo "<script type='text/javascript'>alert('Requested has been Rejected !'); 
					 window.location.replace(\"dashboard.php\");
			</script>";
			
		}else{
			echo "<script type='text/javascript'>alert('There is a problem !'); 
					 window.location.replace(\"dashboard.php\");
			</script>";
		}
	}


	
?>