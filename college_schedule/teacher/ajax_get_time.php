
<?php
	include 'connection.php';
	
	
	if(!empty($_POST["teacher_id"])){
		$teacher = $_POST["teacher_id"];
		
		$result = mysql_query("SELECT schedule.lecture_timing_id, lecture_timing.Lecture_time FROM schedule, lecture_timing WHERE schedule.lecture_timing_id=lecture_timing.lecture_timing_id && teacher_id=$teacher ");
		
		
		
		while($row = mysql_fetch_array($result)){
			
			echo "<option value='$row[Lecture_time]'>".$row['Lecture_time']."</option>";
			
		}
		
	}
?>