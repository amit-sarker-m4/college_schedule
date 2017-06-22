<form action="room.php" method="post">
	<table>
		<?php
		include 'connection.php';
								
								
		$x = $_GET['dataId'];
		$result = mysql_query("SELECT * FROM room where room_id='$x'");
								
		while($row = mysql_fetch_array($result)){
									
		$name=$row['room_no'];
				
		echo "<input type='text' name='r_id' value='$x' hidden/>";						
		echo "<tr>";
			echo "<td><input type='text' name='name' value='$name' /></td>";
		echo "</tr>";

		echo "<tr>";
			echo "<td><input type='submit' name='save' value='Save'/> </td>";
		echo "</tr>";
									
		}
		?>
							
								
	</table>
</form>

