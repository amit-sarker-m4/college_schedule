<?php
	include 'navbar.php';

	//session_start();

	include 'connection.php';
		

	if(!isset($_SESSION["sess_user"])){
	
		header("location:../index.php");
	}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
	<style>
		
		td{
			padding:6px;
		}

		#add_form{
			width: 50%;
			margin-right: auto;
			margin-left: auto;
		}
		#inner{
			width: 100%;
			margin-right: auto;
			margin-left: auto;
		}
		label{
			color:#777777;
		}
	</style>
</head>
<body>
	<div id="add_form">
		<h4 style="color:green">Request for Change Schedule</h4> <hr />
		<div id="inner">
		
			<form action="fun_change_schedule.php" method="post">
				<table>
					<tr>
						<td><input type="text" name="sessionid" value="<?php echo $_SESSION["sess_user"];?>" hidden> </td>
					</tr>
					<tr>
						<td><label for="teacher">Teacher </label></td>
						<td>
							
							<select name="teacher_id" id="teacher" onchange="getId(this.value);">
								
								<option value="Select Subject">--Select Teacher--</option>
								<?php
									include 'connection.php';
									$getres = mysql_query("SELECT teacher_id, teacher_name FROM teacher WHERE teacher_code='$_SESSION[sess_user]' ");
									while($get1 = mysql_fetch_array($getres)){

										echo "<option value='$get1[teacher_id]'>" .$get1['teacher_name']. "</option>";
									}

								?>
								
							</select>

						</td>
					</tr>

					<tr>
						<td><label for="subject">Subject </label></td>
						<td>
							<select name="subject_id" id="subject">
								
								
							</select>
						</td>
					</tr>

					<tr>
						<td><label for="course">Course </label></td>
						<td>
						
							<select name="course_id" id="course1">
									
							</select>

						</td>
					</tr>

					<tr>
						<td><label for="for day">For Day </label></td>
						<td>
							<select name="for_day" id="day">

								<option value=""></option>
						
							</select>
						</td>
						<td><label for="to day">to </label></td>
						<td> 
							<select name="to_day" id="">
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
						<td><label for="Section">Section </label></td>
						<td>
							
							<select name="section" id="section">

								<option value=""></option>
							
							</select>

						</td>
					</tr>

					<tr>
						<td><label for="for time">For Time </label></td>
						<td>
							
							<select name="for_time" id="time">

								<option value=""></option>
						
							</select>

						</td>
						<td><label for="to time">to </label></td>
						<td> 
							<select name="lecture_timing_id" id="">
								<?php
									$result = mysql_query("SELECT * FROM lecture_timing");
									while($row = mysql_fetch_array($result)){

										echo "<option value='$row[lecture_timing_id]'>" .$row['Lecture_time']. "</option>";
									}
								?>
							</select>
						</td>
					</tr>
					
					
					<tr>
						<td><label for="for room">For Room </label></td>
						<td>

							<select name="for_room" id="room">
								<option value=""></option>
								
							</select>

						</td>
						<td><label for="to room">to </label></td>
						<td>
							<select name="room_id" id="">

								<?php
									$result = mysql_query("SELECT * FROM room");
									while($row = mysql_fetch_array($result)){

										echo "<option value='$row[room_id]'>" .$row['room_no']. "</option>";
									}
								?>
								
							</select>
						</td>
					</tr>

					<tr>
						<td></td>
						<td><input type="submit" class="btn btn-success" value="Send Request" name="submit"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>

	<script type="text/javascript">
		function getId(val){
			//alert(val);
			$.ajax({
				type: "POST",
				url: "ajax_get_subject.php",
				data: "teacher_id="+val,
				success: function(data){
					$("#subject").html(data);
				}
				
			});

			$.ajax({
				type: "POST",
				url: "ajax_get_course.php",
				data: "teacher_id="+val,
				success: function(data){
					$("#course1").html(data);
				}
				
			});

			$.ajax({
				type: "POST",
				url: "ajax_get_day.php",
				data: "teacher_id="+val,
				success: function(data){
					$("#day").html(data);
				}
				
			});

			$.ajax({
				type: "POST",
				url: "ajax_get_section.php",
				data: "teacher_id="+val,
				success: function(data){
					$("#section").html(data);
				}
				
			});

			$.ajax({
				type: "POST",
				url: "ajax_get_time.php",
				data: "teacher_id="+val,
				success: function(data){
					$("#time").html(data);
				}
				
			});

			$.ajax({
				type: "POST",
				url: "ajax_get_room.php",
				data: "teacher_id="+val,
				success: function(data){
					$("#room").html(data);
				}
				
			});
			
		}
	</script>

	<!--script type="text/javascript">
		function getsub(val){
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

	<!--script type="text/javascript">
		function get(val){
			//alert(val);
			$.ajax({
				type: "POST",
				url: "ajax_get_day.php",
				data: "teacher_id="+val,
				success: function(data){
					$("#day").html(data);
				}
				
			});

			$.ajax({
				type: "POST",
				url: "ajax_get_section.php",
				data: "teacher_id="+val,
				success: function(data){
					$("#section").html(data);
				}
				
			});

			$.ajax({
				type: "POST",
				url: "ajax_get_time.php",
				data: "teacher_id="+val,
				success: function(data){
					$("#time").html(data);
				}
				
			});

			$.ajax({
				type: "POST",
				url: "ajax_get_room.php",
				data: "teacher_id="+val,
				success: function(data){
					$("#room").html(data);
				}
				
			});
		}
	</script-->


</body>
</html>

<?php
}
?>