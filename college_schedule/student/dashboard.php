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
		}
		#left{
			width: 28%;
			float:left;
			background-color: #COCOCO;
			border:2px solid #D3D3D3;
			border-top-left-radius: 20px;
    		border-bottom-right-radius: 20px;
    		background-color: #F8F8F8;
		}
		#right{
			width: 71%;
			float:right;
			background-color: #COCOCO;
			border:2px solid #D3D3D3;
			border-top-left-radius: 20px;
    		border-bottom-right-radius: 20px;
		}
		#viewbtn, #viewbtn2{
			margin-left: 40px;
			margin-top: 5px;
		}
		#request, #request2{
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
		#myDiv{
			position: fixed;
			left: 0px;
			top: 0px;
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
			$("#viewbtn").click(function(){
				$("#request").show();
				$("#request2").hide();	
				return false;	
			});

		});

		$(document).ready(function(){
			$("#viewbtn2").click(function(){
				$("#request").hide();
				$("#request2").show();	
				return false;
			});
		
		});

		$(document).mouseup(function(e){
			var container = $('#request');
			var con = $('#request2');
			
			if(!container.is(e.target)&&container.has(e.target).length==0){
				container.hide();
			}
			
			if(!con.is(e.target)&&con.has(e.target).length==0){
				con.hide();
			}
		});
		
	</script>
</head>
<body>
	
	<div id="myDiv"></div> <!--to display the gif image-->

	<div id="main">

		<!--Search Division-->
		<div id="left">
			<h4 style="margin-left: 14%; color: green">Menu</h4>

			<button type="submit" class="btn btn-default" id="viewbtn" style="margin-bottom: 5px; color: green; font-weight:bold"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i> Group wise</button>

			<div id="request" style="display: none; width: 95%">

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

			<button type="submit" class="btn btn-default" id="viewbtn2" style="margin-bottom: 5px; color: green; font-weight:bold"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i> Day wise</button>

			<div id="request2" style="display: none; width: 95%">
				

				<h5 style="color:green; margin-left: 12%">Day wise</h5>

				<form action="dashboard.php" method="post">
					<table class="table1" style="border:1ps solid:">
						<tr>
							<td> <label for="ID">Day</label></td>
							<td>
								<select name="day" id="" class="form-control">
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
							<td><input type="submit" name="search" class="btn btn-success" id="btn2"> </td>
						</tr>
					</table>
				</form>
			</div>
		</div>

		<!--View Division-->
		<div id="right">
			<h4 style="text-align: center; color: green">Schedule Information</h4>
				<?php
					include 'connection.php';

					

					if(isset($_POST['submit'])){
						$group = $_POST['course_group'];
						$section = $_POST['course_section'];
						$res = mysql_query("SELECT * FROM schedule WHERE course_id='$group' && section='$section' ");
						$res = mysql_num_rows($res);
						if (!$res == 1) {
								
							echo "<h5 style='color:red; font-weight:bold; text-align:center'>Schedule Not Found !</h5>";
								
						}else{
				?> 
				<form action="pdf.php" method="post">
						<table class="table table-striped">
						<tr>
							
							<th>Subject Name</th>
							<th>Course Name</th>
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

						?>

						<?php
							if (isset($_POST['search'])) {
								$day = $_POST['day'];
								$res = mysql_query("SELECT * FROM schedule WHERE day = '$day' ");
								$res = mysql_num_rows($res);
								if (!$res == 1) {
										
									echo "<h5 style='color:red; font-weight:bold; text-align:center'>Schedule Not Found For ".$day."</h5>";
										
								}else{

						?> 
							</table>
					</form>
					<form action="pdf.php" method="post">
						<table class="table table-striped">
						<tr>
							
							<th>Subject Name</th>
							<th>Course Name</th>
							<th>Section</th>
							<th>Teacher Name</th>
							<th>Day</th>
							<th>Time</th>
							<th>Room No</th>
							
						</tr>


					<?php		

							$day = $_POST['day'];

							$res = mysql_query("SELECT schedule.subject_id, subject.subject_name, schedule.day, course.course_name, schedule.course_id, schedule.section, teacher.teacher_name, schedule.teacher_id, lecture_timing.Lecture_time, schedule.lecture_timing_id, room.room_no, schedule.room_id FROM schedule, course, teacher, lecture_timing, room, subject WHERE schedule.course_id=course.course_id && schedule.teacher_id=teacher.teacher_id && schedule.lecture_timing_id=lecture_timing.lecture_timing_id && schedule.subject_id=subject.subject_id && schedule.room_id=room.room_id && schedule.day='$day'");
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
									echo "<td style='text-align: center'><a href='pdf.php?day=$day' target='_blank' class='btn btn-success'>PDF</a> <td>";
								echo "</tr>";


						}		
						}

					?>

				</table>
			</form>
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
    		<h6 style="font-weight: bold;" id="time"></h6>
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

	<!--set the time for gif image-->

	<script type="text/javascript">

		  (function(){
			var myDiv = document.getElementById("myDiv"),

			  show = function(){
				myDiv.style.display = "block";
				setTimeout(hide, 1500); // 1.5 seconds
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