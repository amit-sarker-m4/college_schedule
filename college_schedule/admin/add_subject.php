<!--?php

	include 'connection.php';

	$scode = $_POST['subject_code'];
	$sname = $_POST['subject_name'];

	$course_id = $_POST['course_id'];
	
	if(isset($_POST['submit'])){
		
		$result=mysql_query("INSERT INTO subject (subject_code, subject_name, course_id) VALUES ('$scode', '$sname', '$course_id')");


		if($result){
	
			echo "<script type='text/javascript'>alert('Data has been saved !'); 
					 window.location.replace(\"subject.php\");
			</script>";
		}else{
			echo "<script type='text/javascript'>alert('Oops ! There is an error !');
					 window.location.replace(\"subject.php\");
			 </script>";
		}

	}

?-->
<!--window.location.replace(\"subject.php\");-->


<?php
	include 'connection.php';

	$scode = $_POST['subject_code'];
	$sname = $_POST['subject_name'];

	$course_id = $_POST['course_id'];
	$teacherr_id = $_POST['teacherr_id'];


	$result = mysql_query("SELECT subject_code, subject_name, course_id FROM subject WHERE subject_code='$scode' && subject_name='$sname' && course_id='$course_id' ");
	$num_rows = mysql_num_rows($result);

	if ($num_rows==1) {
		echo "<script type='text/javascript'>alert('Data already exists! try again'); 
						 window.location.replace(\"subject.php\");
				</script>";
	}else{
		if(isset($_POST['submit'])){
			
			$insert = mysql_query("INSERT INTO subject (subject_code, subject_name, course_id, 	teacher_id) VALUES ('$scode', '$sname', '$course_id', '$teacherr_id')");
			
			if($insert){
				echo "<script type='text/javascript'>alert('Data has been saved !'); 
						 window.location.replace(\"subject.php\");
				</script>";
			}else{
				echo "<script type='text/javascript'>alert('Not saved !'); 
						 window.location.replace(\"subject.php\");
				</script>";
			}
			
		}
	}
?>