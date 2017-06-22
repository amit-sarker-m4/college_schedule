
<?php
	include 'connection.php';
	
	
	if(!empty($_POST["teacher_id"])){
		$teacher = $_POST["teacher_id"];
		
		$result = mysql_query("SELECT section FROM schedule WHERE teacher_id=$teacher LIMIT 1");
		
		
		
		while($row = mysql_fetch_array($result)){
			
			echo "<option value='$row[section]'>".$row['section']."</option>";
			
		}
		
	}
?>