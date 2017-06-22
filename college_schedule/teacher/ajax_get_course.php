
<?php
	include 'connection.php';
	
	
	if(!empty($_POST["teacher_id"])){
		$teacher_id = $_POST["teacher_id"];
		
		$result = mysql_query("SELECT schedule.course_id, course.course_name FROM schedule, course WHERE schedule.course_id=course.course_id && schedule.teacher_id=$teacher_id LIMIT 1");
		
		
		
		while($row = mysql_fetch_array($result)){
			
			echo "<option value='$row[course_id]'>".$row['course_name']."</option>";
			
		}
		
	}
?>