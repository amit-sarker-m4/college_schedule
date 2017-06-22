<?php 
	include 'navbar.php';
?>

<?php
	include '../db/connection.php';

	if(isset($_POST['save'])){

		$c_id = $_POST['c_id'];
		$cname = $_POST['cname'];
		$year = $_POST['year'];
		$section = $_POST['section'];

		$update = mysql_query("UPDATE course SET course_name='$cname', year='$year', section='$section' WHERE course_id='$c_id' ");
		if($update){
			
			echo "<script> alert('Updated Successfully');</script> ";
		}else{
			echo "<script> alert('Not Updated');</script> ";
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
	<script src="js/jquery.js"></script>
	
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
		th{
			/*background-color: #4A4A4A;*/
			background-color: #D1D1D1;
			color:#000;
		}
	</style>
</head>
<body>
	<div id="main" style="margin-top: 5%;">
		<div id="list">
			<div id="title">
				
			</div>
			<div id="add_btn">
				<button type="submit" class="btn btn-default" id="addbtn" style="margin-bottom: 5px;"><i class="fa fa-plus" aria-hidden="true" style="color:green"></i> Add Course</button>
				
				<button type="submit" class="btn btn-default" style="display:none" id="viewbtn"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i> View Course</button>
			</div>
			
			<div id="view_subject">
			<h4 style="color:green">List of Courses</h4>
				<form action="" method="post">
					
					<table class="table table-striped">
					  <tr>
						<th>Course ID</th>
						<th>Course Name</th>
						<th>Year</th>
						<th>Section</th>
						<th>Subject Id</th>
						<th>Teacher Id</th>
						<th>Options</th>	
					  </tr>

					 	<?php
					 		include 'connection.php';

					 		$result = mysql_query("SELECT course.course_id, course.course_name, course.year, course.section, subject.subject_name, teacher.teacher_name from course, subject, teacher WHERE course.subject_id=subject.subject_id && course.teacher_id=teacher.teacher_id");


					 		while($row = mysql_fetch_array($result)){
								
					 			$id = $row['course_id'];

								echo "<tr>";
								echo "<td>" .$row['course_id']. "</td>";
								echo "<td>" .$row['course_name']. "</td>";
								echo "<td>" .$row['year']. "</td>";
								echo "<td>" .$row['section']. "</td>";
								echo "<td>" .$row['subject_name']. "</td>";
								echo "<td>" .$row['teacher_name']. "</td>";
						  		
						  		echo "<td><a href='#popup1' data-id='$id' class='modalLink'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true' style='color:green'></i></a>

						  		<a href='delete_course.php?course_id=$row[course_id]'><i class='fa fa-trash-o fa-lg' aria-hidden='true' style='color:red'></i></a></td>";
							
								echo "</tr>";
						  	}
					  	?>
					</table>
				</form>	
			</div>
		</div>
		<div id="add_form" style="display:none">
		<h4 style="color:green">Add New Course</h4> <hr />
			<div id="inner">
				<form action="add_course.php" method="post">
					<table>
						<tr>
							<td><label for="SubjectCode">Course Name </label></td>
							<td><input type="text" name="course_name"></td>
						</tr>
						<tr>
							<td><label for="year">In Year </label></td>
							<td>
								<select name="year">
								  <option value="2020">2020</option>
								  <option value="2019">2019</option>
								  <option value="2018">2018</option>
								  <option value="2017" selected>2017</option>
								</select>
							</td>
						</tr>
						
						<tr>
							<td><label for="section">In Section </label></td>
							<td>
								<select name="section">
								  	<option value="D">D</option>
								  	<option value="C">C</option>
								 	<option value="B">B</option>
								 	<option value="A" selected>A</option>
								</select>
							</td>
						</tr>
						
						<tr>
							<td><label for="subtaught">Subject Taught </label></td>
							<td>
								<select name="subject_id" onchange="getId(this.value);">
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
							<td><label for="TeaTeach">Teacher Teaching </label></td>
							<td>
								<select name="teacher_id" id="subject">
									<option value="" id=""></option>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-success" value="Save Course" name="submit"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>

		<!--pop up box for edit data-->
		<div id="popup1" class="overlay">
			<div class="popup">
				<h4 style="color: green">Edit Course</h4> <hr>
				<a class="close" href="#">&times;</a>
					<div class="content">
						
					</div>
			</div>
		</div>
	</div>

	<script>
		$('.modalLink').click(function(){
		    var dataId=$(this).attr('data-id');
		    $.ajax({url:"edit_course.php?dataId="+dataId,cache:false,success:function(result){
		        $(".content").html(result);
		    }});
		});
	</script>

	<script type="text/javascript">
		function getId(val){
			//alert(val);
			$.ajax({
				type: "POST",
				url: "ajax_get_teacher.php",
				data: "subject_id="+val,
				success: function(data){
					$("#subject").html(data);
				}
				
			});
			
		}
	</script>

</body>
</html>