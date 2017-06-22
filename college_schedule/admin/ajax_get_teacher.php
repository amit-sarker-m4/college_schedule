
<?php
	include 'connection.php';
	
	
	if(!empty($_POST["subject_id"])){
		$subject = $_POST["subject_id"];
		
		$result = mysql_query("SELECT teacher_id, teacher_name FROM teacher WHERE subject_id=$subject ");
		
		
		
		while($row = mysql_fetch_array($result)){
			
			echo "<option value='$row[teacher_id]'>".$row['teacher_name']."</option>";
			
		}
		
	}
?>