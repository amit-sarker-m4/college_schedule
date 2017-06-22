<form action="subject.php" method="post">
	<table>
		<?php
		include 'connection.php';
								
								
		$x = $_GET['dataId'];
		$result = mysql_query("SELECT * FROM subject where subject_id='$x'");
								
		while($row = mysql_fetch_array($result)){

		$id=$row['subject_id'];							
		$code=$row['subject_code'];
		$name=$row['subject_name'];
			
			echo "<input type='text' name='s_id' value='$x' hidden/>";

				echo "<tr>";
					echo "<td><input type='text' name='id' value='$id' readonly/></td>"; 
				echo "</tr>";
					
				echo "<tr>";
					echo "<td><input type='text' name='scode' value='$code'/></td>"; 
				echo "</tr>";

				echo "<tr>";
					echo "<td><input type='text' name='sname' value='$name'/></td>"; 
				echo "</tr>";

				echo "<tr>";
					echo "<td><input type='submit' name='save' value='Save'/></td>"; 
				echo "</tr>";
										
		}
		?>
							
								
	</table>
</form>