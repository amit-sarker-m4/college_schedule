<form action="timing.php" method="post">
	<table>
		<?php
		include 'connection.php';
								
								
		$x = $_GET['dataId'];
		$result = mysql_query("SELECT * FROM lecture_timing where lecture_timing_id='$x'");
								
		while($row = mysql_fetch_array($result)){
									
		$name=$row['Lecture_time'];
			
			echo "<input type='text' name='t_id' value='$x' hidden/>";

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