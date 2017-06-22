<?php 
	include 'navbar.php';
?>

<?php
	include '../db/connection.php';

	if(isset($_POST['save'])){

		$sche_id = $_POST['sche_id'];
		$day = $_POST['day'];
		$section = $_POST['section'];
		

		$update = mysql_query("UPDATE schedule SET day='$day', section='$section' WHERE schedule_id='$sche_id' ");
		if($update){
			
			echo "<script> alert('Updated Successfully');</script> ";
		}else{
			echo "<script> alert('Not Updated');</script> ";
		}

	}
?>



<!--create schedule and check conflict-->
<?php
	

	if(isset($_POST['submit'])){
			$sname = $_POST['subject_id'];
			$tname = $_POST['teacher_id'];
			$day = $_POST['day'];
			$room = $_POST['room_id'];
			$time = $_POST['lecture_timing_id'];

			$course_id = $_POST['course_id'];
			$section = $_POST['section'];

			$date = date('Y-m-d H:i:s');

		for($a = 0; $a < 3; $a++){

			$res = mysql_query("SELECT * FROM schedule WHERE day='$day[$a]' && room_id='$room[$a]' && lecture_timing_id='$time[$a]'");
			$num_rowss[] = mysql_num_rows($res);
		}

		if ($num_rowss[0]==0 && $num_rowss[1]==0 && $num_rowss[2]==0) {
			
		for($b = 0; $b < 3; $b++){

		mysql_query("INSERT INTO schedule (subject_id, teacher_id, day, room_id, lecture_timing_id, course_id, section, dates) VALUES ('$sname', '$tname', '$day[$b]', '$room[$b]', '$time[$b]', '$course_id', '$section', '$date')");
		}
		
		}else{

			echo "<script type='text/javascript'>
				alert('Schedule Conflict ! try another'); 
					 
			</script>";

		}

	}

?>







<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Dashboard for admin</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/popup.css">
	
	<!--for multi selection option box-->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<script src="js/bootstrap-select.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!--for multi selection option box-->

	<script src="js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#addbtn").click(function(){
				$("#add_form").show();
				$("#view_subject").hide();
				$("#viewbtn").show();
				$("#addbtn").hide();	
			});
			$("#viewbtn").click(function(){
				$("#view_subject").show();
				$("#add_form").hide();
				$("#viewbtn").hide();
				$("#addbtn").show();
			});
			
		});
	</script>
	<style>
		.btn-group.bootstrap-select.show-tick {
   			padding: 6px;
		}
		th{
			background-color: #D1D1D1;
		}
	</style>
</head>
<body>
	<div id="main" style="margin-top: 5%;">
		<div id="list">
			<div id="title">
				
			</div>
			<div id="add_btn">
				<button type="submit" class="btn btn-default" id="addbtn" style="margin-bottom: 5px;"><i class="fa fa-plus" aria-hidden="true" style="color:green"></i> Create Schedule</button>
				
				<button type="submit" class="btn btn-default" style="display:none" id="viewbtn"><i class="fa fa-eye" aria-hidden="true" style="color:green;"></i> View Schedule</button>
			</div>
			
			<div id="view_subject">
			<h4 style="color:green; ">Schedule</h4>
				<form action="schedule.php" method="post">
					
					<table class="table table-striped">
					  <tr>
						<th>Schedule ID</th>
						<th>Course Name</th>
						<th>Subject Name</th>
						<th>Teacher Name</th>
						<th>Day</th>
						<th>Room No</th>
						<th>Time</th>
						<th>Section</th>
						<th>Options</th>	
					  </tr>

					  	<?php
					  	include 'connection.php';

						  	$result = mysql_query("SELECT schedule.schedule_id, subject.subject_name, schedule.subject_id, teacher.teacher_name, schedule.teacher_id, schedule.day, room.room_no, schedule.room_id, lecture_timing.Lecture_time, schedule.lecture_timing_id, course.course_name, schedule.course_id, schedule.section FROM schedule, subject, teacher, room, lecture_timing, course WHERE schedule.subject_id=subject.subject_id && schedule.teacher_id=teacher.teacher_id && schedule.room_id=room.room_id && schedule.lecture_timing_id=lecture_timing.lecture_timing_id && schedule.course_id=course.course_id");

						  	while($row = mysql_fetch_array($result)){
						  		$id=$row['schedule_id'];
							 	echo "<tr>";
							 	echo "<td>" .$row['schedule_id']. "</td>";
							 	echo "<td>" .$row['course_name']."</td>";
								echo "<td>" .$row['subject_name']. "</td>";
								echo "<td>" .$row['teacher_name']. "</td>";
								echo "<td>" .$row['day']. "</td>";
								echo "<td>" .$row['room_no']. "</td>";
								echo "<td>" .$row['Lecture_time']. "</td>";
								echo "<td>" .$row['section']."</td>";
								
								echo "<td><a href='#popup1' data-id='$id' class='modalLink'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true' style='color:green'></i></a>

									<a href='delete_schedule.php?schedule_id=$row[schedule_id]'><i class='fa fa-trash-o fa-lg' aria-hidden='true' style='color:red'></i></a></td>";
							  	echo "</tr>";
							  }
					 	 ?>
					</table>
				</form>	
			</div>
		</div>
		<div id="add_form" style="display:none">
		<h4 style="color:green; ">Add New Class Schedule</h4> <hr />
			<div id="inner">
				<form action="schedule.php" method="post">
					<table>
						<tr>
							<td><label for="SubjectName">Subject Name </label></td>
							<td>
								<select name="subject_id" id="subject" onchange="getId(this.value);">
								
									
									<option value="">--Select Subject--</option>
									<?php
										include 'connection.php';

										$result = mysql_query("SELECT subject_id, subject_name FROM subject");
										while($row = mysql_fetch_array($result)){
											echo "<option value='$row[subject_id]'>" .$row['subject_name']. "</option>";
										}
									?>
									
								</select>
							</td>
						</tr>

						<tr>
							<td><label for="CourseName">Course Name </label></td>
							<td>
								<select name="course_id" id="course">
									
									<option value="" id=""></option>
									
								</select>
							</td>
						</tr>
						<!--tr>
							<td><label for="SubjectName">Subject Name </label></td>
							<td>
								<select name="subject_id" id="subject" onchange="get(this.value);">
								
									<option value="" id=""></option>
									
								</select>
							</td>
						</tr-->
						<tr>
							<td><label for="TeacherName">Teacher ID </label></td>
							<td>
								<select name="teacher_id" id="teacher">

									<option value="" id=""></option>
									
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="SectionName">Section Name </label></td>
							<td>
								<select name="section">
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="Days">Days </label></td>
							<td>
								<select name="day[]" id="first-disabled2" class="selectpicker" multiple data-hide-disabled="true" data-size="7">
									<option value="Saturday">Saturday</option>
									<option value="Sunday">Sunday</option>
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednessday">Wednessday</option>
									<option value="Thrusday">Thrusday</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="Time">Class Time </label></td>
							<td>
								<select name="lecture_timing_id[]" id="first-disabled2" class="selectpicker" multiple data-hide-disabled="true" data-size="7">
									<?php
										include 'connection.php';

										$result = mysql_query("SELECT * FROM lecture_timing");
										while($row = mysql_fetch_array($result)){
											echo "<option value='$row[lecture_timing_id]'>" .$row['Lecture_time']. "</option>";
										}
									?>
								</select>
							</td>
							
						</tr>
						<tr>
							<td><label for="Room">Room No </label></td>
							<td>
								<select name="room_id[]" id="first-disabled2" class="selectpicker" multiple data-hide-disabled="true" data-size="7">
									<?php
										include 'connection.php';

										$result = mysql_query("SELECT room_id, room_no FROM room");
										while($row = mysql_fetch_array($result)){
											echo "<option value='$row[room_id]'>" .$row['room_no']. "</option>";
										}
									?>
								</select>
							</td>
						</tr>
						
						<tr>
							<td><input type="date" name="date" hidden> </td>
						</tr>

						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-success" value="Save Schedule" name="submit"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>

		<!--pop up box for edit data-->
		<div id="popup1" class="overlay">
			<div class="popup">
				<h4 style="color: green">Edit Schedule</h4> <hr>
				<a class="close" href="#">&times;</a>
					<div class="content">
						
					</div>
			</div>
		</div>
	</div>

	<script>
	  $(document).ready(function () {
	    var mySelect = $('#first-disabled2');

	    $('#special').on('click', function () {
	      mySelect.find('option:selected').prop('disabled', true);
	      mySelect.selectpicker('refresh');
	    });
	  });
	</script>


	<script type="text/javascript">
		function getId(val){
			//alert(val);
			$.ajax({
				type: "POST",
				url: "ajax_get_course.php",
				data: "subject_id="+val,
				success: function(data){
					$("#course").html(data);
				}
				
			});

			$.ajax({
				type: "POST",
				url: "ajax_get_teacher.php",
				data: "subject_id="+val,
				success: function(data){
					$("#teacher").html(data);
				}
				
			});
			
		}
	</script>

	<!--script type="text/javascript">
		function get(val){
			//alert(val);
			$.ajax({
				type: "POST",
				url: "ajax_get_teacher.php",
				data: "subject_id="+val,
				success: function(data){
					$("#teacher").html(data);
				}
				
			});
		}
	</script-->

	<script>
		$('.modalLink').click(function(){
		    var dataId=$(this).attr('data-id');
		    $.ajax({url:"edit_schedule.php?dataId="+dataId,cache:false,success:function(result){
		        $(".content").html(result);
		    }});
		});
	</script>

</body>
</html>