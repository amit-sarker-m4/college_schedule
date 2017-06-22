<form action="course.php" method="post">
	<table>
		<?php
		include 'connection.php';
								
								
		$x = $_GET['dataId'];
		$result = mysql_query("SELECT course.course_id, course.course_name, course.year, course.subject_id, subject.subject_name, course.section, course.teacher_id, teacher.teacher_name FROM course, subject, teacher WHERE course.subject_id=subject.subject_id && course.teacher_id=teacher.teacher_id && course.course_id='$x'");
								
		while($row = mysql_fetch_array($result)){

		$id=$row['course_id'];							
		$name=$row['course_name'];
		$year=$row['year'];
		$section=$row['section'];
		$subject_id=$row['subject_name'];
		$teacher_id=$row['teacher_name'];

		echo "<input type='text' name='c_id' value='$x' hidden/>";
		
			echo "<tr>";
				echo "<td><input type='text' name='id' value='$id' readonly/></td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td><input type='text' name='cname' value='$name' /></td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td><input type='text' name='year' value='$year' /></td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td><input type='text' name='section' value='$section' /></td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td><input type='text' name='sname' value='$subject_id' readonly/></td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td><input type='text' name='tname' value='$teacher_id' readonly/></td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td><input type='submit' name='save' value='Save'/> </td>";
			echo "</tr>";
										
		}
		?>
							
								
	</table>
</form>