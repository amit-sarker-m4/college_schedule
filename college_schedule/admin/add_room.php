<!--?php
	include 'connection.php';
		
		$room = $_POST['room_no'];
		
	
		if(isset($_POST['submit'])){
			
			$result = mysql_query("INSERT INTO room (room_no) VALUES ('$room')");

			if($result){

				echo "<script type='text/javascript'>alert('Data has been saved !'); 
						 window.location.replace(\"room.php\");
				</script>";
				
			}else{
				
				echo "<script type='text/javascript'>alert('Oops ! There is an error !'); 
					 window.location.replace(\"room.php\");
				</script>";
			}
			
		}

?-->

<?php
	include 'connection.php';

	$room = $_POST['room_no'];

	$result = mysql_query("SELECT * FROM room WHERE room_no='$room'");
	$num_rows = mysql_num_rows($result);

	if ($num_rows==1) {
		echo "<script type='text/javascript'>alert('Data already exists! try again'); 
						 window.location.replace(\"room.php\");
				</script>";
	}else{
		if(isset($_POST['submit'])){
			
			$insert = mysql_query("INSERT INTO room (room_no) VALUES ('$room')");
			
			if($insert){
				echo "<script type='text/javascript'>alert('Data has been saved !'); 
						 window.location.replace(\"room.php\");
				</script>";
			}else{
				echo "<script type='text/javascript'>alert('Not saved !'); 
						 window.location.replace(\"room.php\");
				</script>";
			}
			
		}
	}
?>

