
<?php
	include 'connection.php';
	
	
	if(!empty($_POST["teacher_id"])){
		$teacher = $_POST["teacher_id"];
		
		$result = mysql_query("SELECT schedule.room_id, room.room_no FROM schedule, room WHERE schedule.room_id=room.room_id && teacher_id=$teacher ");
		
		
		
		while($row = mysql_fetch_array($result)){
			
			echo "<option value='$row[room_no]'>".$row['room_no']."</option>";
			
		}
		
	}
?>