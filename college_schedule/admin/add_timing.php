<!--?php
	include 'connection.php';

	$res = mysql_query("SELECT * FROM lecture_timing");

	$numrows = mysql_num_rows($res);

	if($numrows == 8){
		echo "<script type='text/javascript'>alert('Timing already exists !'); 
					 window.location.replace(\"timing.php\");
			</script>";
	}else{
		
		$Lecture = $_POST['Lecture_time'];



		if(isset($_POST['submit'])){
			
			$result = mysql_query("INSERT INTO lecture_timing (Lecture_time) VALUES ('$Lecture')");

			if($result){

				echo "<script type='text/javascript'>alert('Data has been saved !'); 
						 window.location.replace(\"timing.php\");
				</script>";
				
			}else{
				
				echo "<script type='text/javascript'>alert('Oops ! There is an error !'); 
					 window.location.replace(\"timing.php\");
				</script>";
			}
			
		}

	}
?-->


<?php
	include 'connection.php';

	$Lecture = $_POST['Lecture_time'];


	$result = mysql_query("SELECT * FROM lecture_timing WHERE Lecture_time='$Lecture'");
	$num_rows = mysql_num_rows($result);

	if ($num_rows==1) {
		echo "<script type='text/javascript'>alert('Data already exists! try again'); 
						 window.location.replace(\"timing.php\");
				</script>";
	}else{
		if(isset($_POST['submit'])){
			
			$insert = mysql_query("INSERT INTO lecture_timing (Lecture_time) VALUES ('$Lecture')");
			
			if($insert){
				echo "<script type='text/javascript'>alert('Data has been saved !'); 
						 window.location.replace(\"timing.php\");
				</script>";
			}else{
				echo "<script type='text/javascript'>alert('Not saved !'); 
						 window.location.replace(\"timing.php\");
				</script>";
			}
			
		}
	}
?>
