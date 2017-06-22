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
	<title>Schedule</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<style>
		#main{
			width:79%;
			margin-left: auto;
			margin-right: auto;
			background-color: #D3D3D3;
			margin-top: 4%;
		}
		#left{
			width: 28%;
			float:left;
			/*background-color: #COCOCO;*/
			border:2px solid #E6E6E6;
			border-top-left-radius: 15px;
    		border-bottom-right-radius: 15px;
    		background-color: #FFF;
    		margin-top:5px;
		}
		#right{
			width: 71%;
			float:right;
			background-color: #FFF;
			border:2px solid #E6E6E6;
			border-top-left-radius: 15px;
    		border-bottom-right-radius: 15px;
    		margin-top:5px;
		}
		#viewbtn, #viewbtn1, #viewbtn2, #all_schedule{
			margin-left: 40px;
			margin-top: 5px;
			font-weight: bold;
		}
		#request1, #request2, #request3{
			margin-left: auto;
			margin-right: auto;
		}
		td{
			padding:6px;
		}
		th, label{
			color:#808080;
		}
		table th{
			background-color: #D1D1D1;
		}
		#block{
			width: 100%; 
			height: 82px;
			/*margin-bottom: 10px;*/
			background-color: #FFF;
		}
		#first, #second{
		 	float: left;
		 	width: 24.8%;
		    height: 80px;
		    background-color: #fff;
		    border: 1px solid #E6E6E6;
		    margin: 1px;
		    border-radius: 3px;
		}
		
		#third, #fourth{
			float: right; 
			width: 24.8%;
		    height: 80px;
		    background-color: #fff;
		    border: 1px solid #E6E6E6;
		    margin: 1px;
		    border-radius: 3px;
		}

		#myDiv{
			position: fixed;
			left: 0px;
			top: 9px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url('img/ajax-loader-new.gif') 50% 50% no-repeat;
			background-size: 28% 40%;
		}
		
	</style>
	<script src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#viewbtn1").click(function(){
				$("#request1").show(300);
				$("#request2").hide();
				$("#request3").hide();
				$("#request4").hide();	
				return false;	
			});

		});



		$(document).ready(function(){
			$("#viewbtn2").click(function(){
				$("#request1").hide();
				$("#request2").show(300);
				$("#request3").hide();
				$("#request4").hide();	
				return false;
			});
		});

		$(document).ready(function(){
			$("#viewbtn3").click(function(){
				$("#request1").hide();
				$("#request2").hide();
				$("#request3").show(300);
				$("#request4").hide();
				return false;
			});
		});

		$(document).ready(function(){
			$("#viewbtn4").click(function(){
				$("#request1").hide();
				$("#request2").hide();
				$("#request3").hide();
				$("#request4").show(300);	
				return false;
			});
		});

		$(document).mouseup(function(e){
			var container = $('#request1');
			var cont = $('#request2');
			var con = $('#request3');
			var co = $('#request4');
			
			if(!container.is(e.target)&&container.has(e.target).length==0){
				container.hide();
			}
			
			if(!cont.is(e.target)&&cont.has(e.target).length==0){
				cont.hide();
			}

			if(!con.is(e.target)&&con.has(e.target).length==0){
				con.hide();
			}

			if(!co.is(e.target)&&co.has(e.target).length==0){
				co.hide();
			}
		});
		
	</script>
</head>
<body>
	<div id="myDiv"></div> <!-- to display gif image-->

	<div id="main">

		<!--block division-->

		<div id="block">
			<div id="first">
				<div style="float:left; width: 40%">
					<h1 style="text-align: center;"><i class="fa fa-info-circle" aria-hidden="true"></i></h1>
				</div>
				<div style="float:right; width: 60%">
					<h5 style="text-align: center; font-weight: bold">Total Request <br> <br> <span style="color:black; font-size:20px">
					<?php
					 	include 'connection.php';

					 	$result = mysql_query("SELECT * FROM request");
					 	$result = mysql_num_rows($result);
					 	echo $result;
					 ?>
					</span></h5>

				</div>
			</div>
			<div id="second">
				<div style="float:left; width: 40%">
					<h1 style="text-align: center; color: green"><i class="fa fa-info-circle" aria-hidden="true"></i></h1>
				</div>
				<div style="float:right; width: 60%">
					<h5 style="text-align: center; font-weight: bold">Accepted Request <br> <br> <span style="color:green; font-size:20px">
					<?php
					 	include 'connection.php';

					 	$result = mysql_query("SELECT * FROM request WHERE 	status='accepted' ");
					 	$result = mysql_num_rows($result);
					 	echo $result;
					 ?>
					</span></h5>
					 
				</div>
				
			</div>
			<div id="third">
				<div style="float:left; width: 40%">
					<h1 style="text-align: center; color: red"><i class="fa fa-info-circle" aria-hidden="true"></i></h1>
				</div>
				<div style="float:right; width: 60%">
					<h5 style="text-align: center; font-weight: bold">Rejected Request <br> <br> <span style="color:red; font-size:20px">
					<?php
					 	include 'connection.php';

					 	$result = mysql_query("SELECT * FROM request WHERE 	status='rejected' ");
					 	$result = mysql_num_rows($result);
					 	echo $result;
					 ?>
					</span></h5>
					 
				</div>
				
			</div>
			<div id="fourth">
				<div style="float:left; width: 40%">
					<h1 style="text-align: center; color: blue"><i class="fa fa-info-circle" aria-hidden="true"></i></i></h1>
				</div>
				<div style="float:right; width: 60%">
					<h5 style="text-align: center; font-weight: bold;">Pending Request <br> <br> <span style="color:blue; font-size:20px">
					<?php
					 	include 'connection.php';

					 	$result = mysql_query("SELECT * FROM request WHERE 	status='requested' ");
					 	$result = mysql_num_rows($result);
					 	echo $result;
					 ?>
					</span></h5>
					 
				</div>
			</div>
		</div>


		<!--Search Division-->
		<div id="left">
			<h4 style="margin-left: 14%; color: green">Menu</h4>
			<div id="schedule_fullll">
				<!--Form of View All Schedule-->
				<form action="dashboard.php" method="post">
					<table>
						<tr>
							<td>
								<input type="submit" class="btn btn-default" id="all_schedule" style="margin-bottom: 5px; color: green; font-weight:bold" value="Full Schedule" name="all_sche" />
							</td>
						</tr>
					</table>
				</form>

			</div>


			<button type="submit" class="btn btn-default" id="viewbtn1" style="margin-bottom: 5px; color: green; font-weight:bold"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i> Group wise</button>

			<div id="request1" style="display: none; width: 95%">

				<h5 style="color:green; margin-left: 12%">Group and Section wise</h5>

				<form action="dashboard.php" method="post">
					<table class="table1" style="border:1ps solid:">
						<tr>
							<td> <label for="ID">Group</label></td>
							<td>
								<select name="course_group" id="" class="form-control">

									<?php
										include 'connection.php';

										$result = mysql_query("SELECT course_id, course_name FROM course");
										while($row = mysql_fetch_array($result)){
											echo "<option value='$row[course_id]'>".$row['course_name']."</option>";
										}
									?>
								
								</select>
							</td>
						</tr>
						<tr>
							<td> <label for="ID">Section</label></td>
							<td>
								<select name="course_section" id="" class="form-control">
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" class="btn btn-success" id="btn1"> </td>
						</tr>
					</table>
				</form>
			</div>
			
			<br>

			<button type="submit" class="btn btn-default" id="viewbtn2" style="margin-bottom: 5px; color: green; font-weight:bold"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i> Teacher wise</button>

			<div id="request2" style="display: none; width: 95%">
				

				<h5 style="color:green; margin-left: 12%">Teacher wise</h5>

				<form action="dashboard.php" method="post">
					<table class="table1" style="border:1ps solid:">
						<tr>
							<td> <label for="ID">Day</label></td>
							<td>
								<select name="teacher" id="" class="form-control">
								<?php

									include 'connection.php';
									$res = mysql_query("SELECT * FROM teacher");
									

									while ($row = mysql_fetch_array($res)) {
										

										echo "<option value='$row[teacher_id]'>".$row['teacher_name']."</option>";
									}	
									
								?>	
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="search" class="btn btn-success" id="btn2"> </td>
						</tr>
					</table>
				</form>
			</div>

			<br>

			<button type="submit" class="btn btn-default" id="viewbtn3" style="margin-bottom: 5px; color: green; font-weight:bold; margin-left: 13.2%;"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i> Date wise</button>

			<div id="request3" style="display: none; width: 95%">
				

				<h5 style="color:green; margin-left: 12%">Date wise</h5>

				<form action="dashboard.php" method="post">
					<table class="table1" style="border:1ps solid:">
						<tr>
							<td> <label for="ID">Date </label></td>
							<td>
								<input type="date" name="schedule_date">
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="date_search" class="btn btn-success" id="btn2"> </td>
						</tr>
					</table>
				</form>
			</div>
			
			<br>

			<button type="submit" class="btn btn-default" id="viewbtn4" style="margin-bottom: 5px; color: green; font-weight:bold; margin-left: 13.2%;"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i> Day wise</button>

			<div id="request4" style="display: none; width: 95%">
				

				<h5 style="color:green; margin-left: 12%">Day wise</h5>

				<form action="dashboard.php" method="post">
					<table class="table1" style="border:1ps solid:">
						<tr>
							<td> <label for="ID">Day </label></td>
							<td>
								<select name="day_wise" id="" class="form-control">
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
							<td></td>
							<td><input type="submit" name="day_search" class="btn btn-success" id="btn3"> </td>
						</tr>
					</table>
				</form>
			</div>

		</div>
		


		<!--View Division-->
		<div id="right">


			<h4 style="text-align: center; color: green">Schedule Information</h4>
				
					<!--For fetching All schedule--> 


					<?php
							
						if(isset($_POST['all_sche'])){
							
					?>

					<table class="table table-striped">
						<tr>
							<th>Course Name</th>
							<th>Subject Name</th>
							<th>Section</th>
							<th>Teacher Name</th>
							<th>Day</th>
							<th>Time</th>
							<th>Room No</th>
							
						</tr>

					<?php	

							$result = mysql_query("SELECT course.course_name, schedule.course_id, schedule.subject_id, subject.subject_name, schedule.day, room.room_no, schedule.room_id, teacher.teacher_name, schedule.teacher_id, lecture_timing.Lecture_time, schedule.lecture_timing_id, schedule.section FROM course, schedule, room, teacher, lecture_timing, subject  WHERE schedule.room_id=room.room_id && schedule.teacher_id=teacher.teacher_id && schedule.lecture_timing_id=lecture_timing.lecture_timing_id && schedule.subject_id=subject.subject_id && schedule.course_id=course.course_id ");

							while($row = mysql_fetch_array($result)){

								echo "<tr>";
									
									echo "<td>".$row['subject_name']."</td>";
									echo "<td>".$row['course_name']."</td>";
									echo "<td>".$row['section']."</td>";
									echo "<td>".$row['teacher_name']."</td>";
									echo "<td>".$row['day']."</td>";
									echo "<td>".$row['Lecture_time']."</td>";
									echo "<td>".$row['room_no']."</td>";

								echo "</tr>";
							}

								echo "<tr>";
									echo "<td style='text-align: center'><a href='pdf5.php' target='_blank' class='btn btn-success'>PDF</a> <td>";
								echo "</tr>";
						}	
						

						?>
					






					<!--For fetching Group wise schedule--> 


					<?php
							
						if(isset($_POST['submit'])){
							$group = $_POST['course_group'];
							$section = $_POST['course_section'];
							$res = mysql_query("SELECT * FROM schedule WHERE course_id='$group' && section='$section' ");
							$res = mysql_num_rows($res);
							if (!$res == 1) {
								
								echo "<h5 style='color:red; font-weight:bold; text-align:center'>Schedule Not Found !</h5>";
								
							}else{
					?>

					<table class="table table-striped">
						<tr>
							<th>Course Name</th>
							<th>Subject Name</th>
							<th>Section</th>
							<th>Teacher Name</th>
							<th>Day</th>
							<th>Time</th>
							<th>Room No</th>
							
						</tr>

					<?php	

							$group = $_POST['course_group'];
							$section = $_POST['course_section'];



							$result = mysql_query("SELECT course.course_name, schedule.course_id, schedule.subject_id, subject.subject_name, schedule.day, room.room_no, schedule.room_id, teacher.teacher_name, schedule.teacher_id, lecture_timing.Lecture_time, schedule.lecture_timing_id, schedule.section FROM course, schedule, room, teacher, lecture_timing, subject  WHERE course.course_id = $group && schedule.course_id = $group && schedule.room_id=room.room_id && schedule.teacher_id=teacher.teacher_id && schedule.lecture_timing_id=lecture_timing.lecture_timing_id && schedule.subject_id=subject.subject_id && schedule.section='$section'");

							while($row = mysql_fetch_array($result)){

								echo "<tr>";
									
									echo "<td>".$row['subject_name']."</td>";
									echo "<td>".$row['course_name']."</td>";
									echo "<td>".$row['section']."</td>";
									echo "<td>".$row['teacher_name']."</td>";
									echo "<td>".$row['day']."</td>";
									echo "<td>".$row['Lecture_time']."</td>";
									echo "<td>".$row['room_no']."</td>";

								echo "</tr>";
							}

								echo "<tr>";
									echo "<td style='text-align: center'><a href='pdf2.php?course_group=$group&&course_section=$section' target='_blank' class='btn btn-success'>PDF</a> <td>";
								echo "</tr>";
						}	
						}

						//teacher wise schedule generator

						if(isset($_POST['search'])){
							$teacher = $_POST['teacher'];
							$res = mysql_query("SELECT * FROM schedule WHERE teacher_id = '$teacher' ");
							$res = mysql_num_rows($res);
							if (!$res == 1) {
								
								echo "<h5 style='color:red; font-weight:bold; text-align:center'>Schedule Not Found !</h5>";
								
							}else{
						?>

						</table>
						<table class="table table-striped">
						<tr>
							<th>Course Name</th>
							<th>Subject Name</th>
							<th>Section</th>
							<th>Teacher Name</th>
							<th>Day</th>
							<th>Time</th>
							<th>Room No</th>
							
						</tr>

						<?php


						$teacher = $_POST['teacher'];

						$res = mysql_query("SELECT schedule.subject_id, subject.subject_name, schedule.day, course.course_name, schedule.course_id, schedule.section, teacher.teacher_name, schedule.teacher_id, lecture_timing.Lecture_time, schedule.lecture_timing_id, room.room_no, schedule.room_id FROM schedule, course, teacher, lecture_timing, room, subject WHERE schedule.course_id=course.course_id && schedule.teacher_id=$teacher && teacher.teacher_id=$teacher && schedule.lecture_timing_id=lecture_timing.lecture_timing_id && schedule.subject_id=subject.subject_id && schedule.room_id=room.room_id");
						while ($row2 = mysql_fetch_array($res)) {
							echo "<tr>";
			
								echo "<td>".$row2['subject_name']."</td>";
								echo "<td>".$row2['course_name']."</td>";
								echo "<td>".$row2['section']."</td>";
								echo "<td>".$row2['teacher_name']."</td>";
								echo "<td>".$row2['day']."</td>";
								echo "<td>".$row2['Lecture_time']."</td>";
								echo "<td>".$row2['room_no']."</td>";
							echo "</tr>";
						}
							echo "<tr>";
								echo "<td style='text-align: center'><a href='pdf3.php?teacher=$teacher' target='_blank' class='btn btn-success'>PDF</a> <td>";
							echo "</tr>";
						}

						}

						//date wise schedule generator

						if(isset($_POST['date_search'])){
								$date = $_POST['schedule_date'];

								$result = mysql_query("SELECT DAYNAME('$date')");

								while($row = mysql_fetch_array($result)){  
										
										$day_name = $row["DAYNAME('$date')"]; 
										
								} 
								$res = mysql_query("SELECT * FROM schedule WHERE day='$day_name' ");
								$res = mysql_num_rows($res);
								if (!$res == 1) {
									
									echo "<h5 style='color:red; font-weight:bold; text-align:center'>Schedule Not Found For ".$date."</h5>";
									
								}else{
							?>
							</table>
							<table class="table table-striped">
							<tr>
								<th>Course Name</th>
								<th>Subject Name</th>
								<th>Section</th>
								<th>Teacher Name</th>
								<th>Day</th>
								<th>Time</th>
								<th>Room No</th>
								
							</tr>

							<?php

							$date = $_POST['schedule_date'];

							$result = mysql_query("SELECT DAYNAME('$date')");

							while($row = mysql_fetch_array($result)){  
									
									$day_name = $row["DAYNAME('$date')"]; 
									
							}  
							echo $date; echo $day_name; 
							
							$res = mysql_query("SELECT schedule.schedule_id, schedule.day, schedule.subject_id, subject.subject_name, schedule.section, schedule.teacher_id, teacher.teacher_name, schedule.lecture_timing_id, lecture_timing.Lecture_time, schedule.room_id, room.room_no  FROM schedule, subject, teacher, lecture_timing, room WHERE schedule.subject_id=subject.subject_id && schedule.teacher_id=teacher.teacher_id && schedule.lecture_timing_id=lecture_timing.lecture_timing_id && schedule.room_id=room.room_id && day='$day_name' ");
							
							while($row = mysql_fetch_array($res)){
								echo "<tr>";
									echo "<td>".$row['schedule_id']."</td>";
									echo "<td>".$row['subject_name']."</td>";
									echo "<td>".$row['section']."</td>";
									echo "<td>".$row['teacher_name']."</td>";
									echo "<td>".$row['day']."</td>";
									echo "<td>".$row['Lecture_time']."</td>";
									echo "<td>".$row['room_no']."</td>";
								echo "</tr>";
							}
								echo "<tr>";
									echo "<td style='text-align: center'><a href='pdf4.php?day=$day_name' target='_blank' class='btn btn-success'>PDF</a> <td>";
								echo "</tr>";
						}

						}


						//day wise schedule generator

						if(isset($_POST['day_search'])){
							$day_wise = $_POST['day_wise'];
							$res = mysql_query("SELECT * FROM schedule WHERE day = '$day_wise' ");
							$res = mysql_num_rows($res);
							if (!$res == 1) {
								
								echo "<h5 style='color:red; font-weight:bold; text-align:center'>Schedule Not Found For ".$day_wise."</h5>";
								
							}else{

							?>
							</table>
							<table class="table table-striped">
							<tr>
								<th>Course Name</th>
								<th>Subject Name</th>
								<th>Section</th>
								<th>Teacher Name</th>
								<th>Day</th>
								<th>Time</th>
								<th>Room No</th>
								
							</tr>

							<?php

							$day_wise = $_POST['day_wise'];

						
							$res = mysql_query("SELECT schedule.schedule_id, schedule.day, schedule.subject_id, subject.subject_name, schedule.section, schedule.teacher_id, teacher.teacher_name, schedule.lecture_timing_id, lecture_timing.Lecture_time, schedule.room_id, room.room_no  FROM schedule, subject, teacher, lecture_timing, room WHERE schedule.subject_id=subject.subject_id && schedule.teacher_id=teacher.teacher_id && schedule.lecture_timing_id=lecture_timing.lecture_timing_id && schedule.room_id=room.room_id && day='$day_wise' ");
							
							while($row = mysql_fetch_array($res)){
								echo "<tr>";
									echo "<td>".$row['schedule_id']."</td>";
									echo "<td>".$row['subject_name']."</td>";
									echo "<td>".$row['section']."</td>";
									echo "<td>".$row['teacher_name']."</td>";
									echo "<td>".$row['day']."</td>";
									echo "<td>".$row['Lecture_time']."</td>";
									echo "<td>".$row['room_no']."</td>";
								echo "</tr>";
							}
								
								echo "<tr>";
									echo "<td style='text-align: center'><a href='pdf.php?day=$day_wise' target='_blank' class='btn btn-success'>PDF</a> <td>";
								echo "</tr>";
						}
						}

					?>

			</table>
		</div>

	</div>

	<footer style="position: fixed; width: 100%; bottom: 0px; left:0px; ;height: 3em; background-color: #E6E6E6; right: 0px">
		<div id="foo3" style="display: inline-block; margin-left: 150px;">
    		<h6 style="font-weight: bold;">User : <?php echo $_SESSION["sess_user"]; ?> </h6>
    	</div>
    	<div id="foo" style="display: inline-block; margin-left: 150px;">
    		<h6 style="font-weight: bold;">Date: <?php echo  date("d/m/Y"); ?></h6>
    	</div>
    	<div id="foo2" style="display: inline-block; margin-left: 150px;">
    		<h6 style="font-weight: bold;" id="time"> </h6>
    	</div>
    	<div id="foo4" style="display: inline-block; margin-left: 150px;">
    		<h6 style="font-weight: bold;">IP Address: <?php echo $localIPAddress = getHostByName(getHostName());?></h6>
    	</div>
    </footer>

	<!--To display the current time-->
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(timestamp, 1000);
		});

		function timestamp() {
			$.ajax({
				url: 'timestamp.php',
				success: function(data) {
					$('#time').html(data);
				},
			});
		}
	</script>

	<!--set time to display the gif image-->
	<script type="text/javascript">

		  (function(){
			var myDiv = document.getElementById("myDiv"),

			  show = function(){
				myDiv.style.display = "block";
				setTimeout(hide, 2000); // 2 seconds
			  },

			  hide = function(){
				myDiv.style.display = "none";
			  };
	
			show();
		  })();

	</script>

</body>
</html>
<?php
}
?>
