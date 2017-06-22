<?php

	include 'connection.php';


	if(isset($_GET['request_id'])){
		$request_id = $_GET['request_id'];

		$to_day = $_GET['to_day'];
		$room_id = $_GET['room_id'];
		$lecture_timing_id = $_GET['lecture_timing_id'];
		$subject_id = $_GET['subject_id'];
		$teacher_id = $_GET['teacher_id'];
		$for_day = $_GET['for_day'];
		$course_id = $_GET['course_id'];
		$section = $_GET['section'];


		// getting room id

		//$getr = $_GET['room_id'];

		//$getroom = mysql_query("SELECT room_id FROM room WHERE room_no='$getr' ");
		//while($row11 = mysql_fetch_array($getroom)){
		//	echo $room_id3 = $row11['room_id'];
		}

		// getting time id

		//$gett = $_GET['for_time'];

		//$gettime = mysql_query("SELECT lecture_timing_id FROM lecture_timing WHERE Lecture_time='$gett' ");
		//while($row12 = mysql_fetch_array($gettime)){
		//	$lecture_timing_id3 = $row12['lecture_timing_id'];
		//}



		$res = mysql_query("SELECT * FROM schedule WHERE schedule.day='$to_day' && schedule.room_id='$room_id' && schedule.lecture_timing_id='$lecture_timing_id' ");
			
		$num_rowss = mysql_num_rows($res);

		if ($num_rowss == 0 ) {



			mysql_query("UPDATE schedule SET day='$to_day', room_id='$room_id', lecture_timing_id='$lecture_timing_id' WHERE subject_id='$subject_id' && teacher_id='$teacher_id' && day='$for_day' && course_id='$course_id' && section='$section' ");

			mysql_query("UPDATE request SET status='accepted' WHERE request_id='$request_id' ");
			
			echo "<script type='text/javascript'>
				alert('Schedule Updated Successfully !'); 
					 window.location.replace(\"schedule.php\");

			</script>";
		
		}else{

			echo "<script type='text/javascript'>
				alert('Schedule Conflict ! try another'); 
					 window.location.replace(\"dashboard.php\");

			</script>";
			
			mysql_query("UPDATE request SET status='rejected' WHERE request_id='$request_id' ");
			
		}




	


	
?>