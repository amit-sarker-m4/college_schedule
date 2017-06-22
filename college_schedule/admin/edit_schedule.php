<form action="schedule.php" method="post">
	<table>
		<?php
		include 'connection.php';
								
								
		$x = $_GET['dataId'];
		$result = mysql_query("SELECT schedule.schedule_id, schedule.course_id, course.course_name, schedule.day, schedule.subject_id, subject.subject_name, schedule.section, schedule.teacher_id, teacher.teacher_name, schedule.room_id, room.room_no, schedule.lecture_timing_id, lecture_timing.Lecture_time FROM schedule, course, subject, teacher, room, lecture_timing WHERE schedule.subject_id=subject.subject_id && schedule.teacher_id=teacher.teacher_id && schedule.course_id=course.course_id && schedule.room_id=room.room_id && schedule.lecture_timing_id=lecture_timing.lecture_timing_id && schedule.schedule_id='$x'");
								
		while($row = mysql_fetch_array($result)){

		$id=$row['schedule_id'];							
		$name=$row['course_name'];
		$day=$row['day'];
		$section=$row['section'];
		$subject_id=$row['subject_name'];
		$teacher_id=$row['teacher_name'];
		$room=$row['room_no'];
		$Lecture_time=$row['Lecture_time'];
		
			echo "<input type='text' name='sche_id' value='$x' hidden/>";

			echo "<tr>";
				echo "<td><input type='text' name='id' value='$id' readonly/></td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td><input type='text' name='cname' value='$name' readonly/></td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td><input type='text' name='sname' value='$subject_id' readonly/></td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td><input type='text' name='tname' value='$teacher_id' readonly/></td>";
			echo "</tr>";


			echo "<tr>";
				echo "<td><input type='text' name='day' value='$day' /></td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td><input type='text' name='room' value='$room' readonly/></td>";
			echo "</tr>";


			echo "<tr>";
				echo "<td><input type='text' name='time' value='$Lecture_time' readonly/></td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td><input type='text' name='section' value='$section' /></td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td><input type='submit' name='save' value='Save'/> </td>";
			echo "</tr>";
										
		}
		?>
							
								
	</table>
</form>