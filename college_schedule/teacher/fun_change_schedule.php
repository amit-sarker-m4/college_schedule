<?php
	include 'connection.php';

	$sessionid = $_POST['sessionid'];

	$subject = $_POST['subject_id'];
	$teacher = $_POST['teacher_id'];

	$course = $_POST['course_id'];
	$section = $_POST['section'];

	$forday = $_POST['for_day'];
	$today = $_POST['to_day'];

	$fortime = $_POST['for_time'];
	$totime = $_POST['lecture_timing_id'];
	
	$forroom = $_POST['for_room'];
	$toroom = $_POST['room_id'];

	//$status = $_POST['status'];

	if(isset($_POST['submit'])){

		$result = mysql_query("INSERT INTO request(subject_id, teacher_id, sessionid, course_id, section, for_day, to_day, for_time, lecture_timing_id, for_room, room_id, status) VALUES('$subject', '$teacher', '$sessionid', '$course', '$section', '$forday', '$today', '$fortime', '$totime', '$forroom', '$toroom', 'requested')");
		if($result){
			echo "<script type='text/javascript'>alert('Request has been sent !'); 
					 window.location.replace(\"change_schedule.php\");
			</script>";
		}else{
			echo "<script type='text/javascript'>alert('Oops ! There is an error !');
					 window.location.replace(\"change_schedule.php\");
			 </script>";
		}

	}
?>