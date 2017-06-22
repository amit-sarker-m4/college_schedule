
<?php
	include 'connection.php';
	
	
	if(!empty($_POST["teacher_id"])){
		$teacher = $_POST["teacher_id"];
		
		$result = mysql_query("SELECT day FROM schedule WHERE teacher_id=$teacher ");
		
		
		
		while($row = mysql_fetch_array($result)){
			
			echo "<option value='$row[day]'>".$row['day']."</option>";
			
		}
		
	}
?>