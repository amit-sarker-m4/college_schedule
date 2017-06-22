<?php

	include 'connection.php';

	$sname = $_POST['subject_id'];
	$tname = $_POST['teacher_id'];
	$day = $_POST['day'];
	$room = $_POST['room_id'];
	$time = $_POST['lecture_timing_id'];

	$course_id = $_POST['course_id'];
	$section = $_POST['section'];

	$date = date('Y-m-d H:i:s');

	

	if(isset($_POST['submit'])){

		for($a = 0; $a < 3; $a++){

			$res = mysql_query("SELECT * FROM schedule WHERE day='$day' && room_id='$room' && lecture_timing_id='$time' ");
			$num_rowss = mysql_num_rows($res);

		if ($num_rowss==0) {
			$result=mysql_query("INSERT INTO schedule (subject_id, teacher_id, day, room_id, lecture_timing_id, course_id, section, date) VALUES ('$sname', '$tname', '".mysql_real_escape_string($day[$a])."', '".mysql_real_escape_string($room[$a])."', '".mysql_real_escape_string($time[$a])."', '$course_id', '$section', '$date')");
		}
	
		}
		

		if($result){
	
			echo "<script type='text/javascript'>alert('Data has been saved !'); 
					 window.location.replace(\"schedule.php\");
			</script>";
		}else{
			echo "<script type='text/javascript'>alert('Oops ! There is an error !');
					 window.location.replace(\"schedule.php\");
			 </script>";
		}

	}

?>
<!--window.location.replace(\"subject.php\");-->

