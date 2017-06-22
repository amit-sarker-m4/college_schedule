
<?php
	include 'connection.php';
	
	
	if(!empty($_POST["teacher_id"])){
		$teacher_id = $_POST["teacher_id"];
		
		$result = mysql_query("SELECT schedule.subject_id, subject.subject_name FROM schedule, subject WHERE schedule.subject_id=subject.subject_id && schedule.teacher_id=$teacher_id LIMIT 1");
		
		
		
		while($row = mysql_fetch_array($result)){
			
			echo "<option value='$row[subject_id]'>".$row['subject_name']."</option>";
			
		}
		
	}
?>