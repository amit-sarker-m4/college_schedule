
<form action="accept_request.php" method="post">
	<table class="table table-hover">
			<!--tr>
				<th style="color:green">From</th>
				<th style="color:green">To</th>
				<th style="color:green">Options</th>
				<th></th>
			</tr-->
		<?php
			include 'connection.php';

			$result = mysql_query("SELECT request.for_day, request.to_day, subject.subject_name, request.subject_id, teacher.teacher_name, request.teacher_id, request.for_room, room.room_no, request.room_id, request.for_time, request.lecture_timing_id, lecture_timing.Lecture_time, request.course_id, course.course_name, request.section, request.request_id, request.status FROM request, subject, teacher, room, lecture_timing, course WHERE request.subject_id=subject.subject_id && request.teacher_id=teacher.teacher_id && request.room_id=room.room_id && request.lecture_timing_id=lecture_timing.lecture_timing_id && request.course_id=course.course_id && request.status='requested' ");


			echo "<tr>";
				echo "<th style='color:green'>"."From"."</th>";
				echo "<th style='color:green'>"."To"."</th>";
				echo "<th style='color:green'>"."Options"."</th>";
				echo "<th></th>";
			echo "</tr>";

			while($row = mysql_fetch_array($result)){

										
				echo "<tr>";

					echo "<td style='color:#808080; font-weight:bold'>".$row['for_day']." (".$row['subject_name'].", ".$row['teacher_name'].", ".$row['course_name'].", ".$row['section'].", ".$row['for_room'].", ".$row['for_time']. ") "."</td>";

					echo "<td style='color:#808080; font-weight:bold'>".$row['to_day']." (".$row['subject_name'].", ".$row['teacher_name'].", ".$row['course_name'].", ".$row['section'].", ".$row['room_no'].", ".$row['Lecture_time']. ") "."</td>";


					echo "<td><a href='accept_request.php?request_id=$row[request_id]&to_day=$row[to_day]&room_id=$row[room_id]&lecture_timing_id=$row[lecture_timing_id]&subject_id=$row[subject_id]&teacher_id=$row[teacher_id]&for_day=$row[for_day]&course_id=$row[course_id]&section=$row[section]' class='btn btn-default' name='accept'><i class='fa fa-check fa-lg' aria-hidden='true' style='color:green'></i></a></td>";
					echo "<td><a href='reject_request.php?request_id=$row[request_id]' class='btn btn-default'><i class='fa fa-times fa-lg' aria-hidden='true' style='color:red'></i></a></td>";

					//echo"<td><input type='submit' name='accept' value='Accept' class='btn btn-default'> </td>";
					//echo"<td><input type='submit' name='reject' value='Reject' class='btn btn-default'> </td>";

				echo "</tr>";
			}

		?>

	</table>
</form>

