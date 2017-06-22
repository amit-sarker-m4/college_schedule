
<?php
	include 'connection.php';
	
	
	if(!empty($_POST["subject_id"])){
		$subject = $_POST["subject_id"];
		
		$result = mysql_query("SELECT course_id, course_name FROM course WHERE subject_id=$subject ");
		
		
		
		while($row = mysql_fetch_array($result)){
			
			echo "<option value='$row[course_id]'>".$row['course_name']."</option>";
			
		}
		
	}
?>