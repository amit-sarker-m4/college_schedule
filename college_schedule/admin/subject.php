<?php 
	include 'navbar.php';
?>

<?php
	include '../db/connection.php';

	if(isset($_POST['save'])){

		$s_id = $_POST['s_id'];
		$scode = $_POST['scode'];
		$sname = $_POST['sname'];
		

		$update = mysql_query("UPDATE subject SET subject_code='$scode', subject_name='$sname' WHERE subject_id='$s_id' ");
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
	
	<!--for multi selection option box>
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<script src="js/bootstrap-select.js"></script>

	<for multi selection option box>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->

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
				<button type="submit" class="btn btn-default" id="addbtn" style="margin-bottom: 5px;"><i class="fa fa-plus" aria-hidden="true" style="color:green"></i> Add Subject</button>
				
				<button type="submit" class="btn btn-default" style="display:none" id="viewbtn"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i> View Subject</button>
			</div>
			
			<div id="view_subject">
			<h4 style="color:green; ">Subject</h4>
				<form action="schedule.php" method="post">
					
					<table class="table table-striped">
					  <tr>
						<th>Subject ID</th>
						<th>Subject Code</th>
						<th>Subject Name</th>
						<th>Course Name</th>
						<th>Options</th>	
					  </tr>

					  	<?php
					  	include 'connection.php';

						  	$result = mysql_query("SELECT subject.subject_id, subject.subject_code, subject.subject_name, subject.course_id, course.course_name FROM subject, course WHERE subject.course_id=course.course_id");

						  	while($row = mysql_fetch_array($result)){

						  		$id = $row['subject_id'];

							 	echo "<tr>";
							 	echo "<td>" .$row['subject_id']. "</td>";
								echo "<td>" .$row['subject_code']. "</td>";
								echo "<td>" .$row['subject_name']. "</td>";
								echo "<td>" .$row['course_name']. "</td>";
								
								echo "<td><a href='#popup1' data-id='$id' class='modalLink'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true' style='color:green'></i></a>

									<a href='delete_subject.php?subject_id=$row[subject_id]'><i class='fa fa-trash-o fa-lg' aria-hidden='true' style='color:red'></i></a></td>";
							  	echo "</tr>";
							  }
					 	 ?>
					</table>
				</form>	
			</div>
		</div>
		<div id="add_form" style="display:none">
		<h4 style="color:green; ">Add New Subjects</h4> <hr />
			<div id="inner">
				<form action="add_subject.php" method="post">
					<table>
						<tr>
							<td><label for="SubjectCode">Subject Code </label></td>
							<td>
								<input type="text" name="subject_code">
							</td>
						</tr>
						<tr>
							<td><label for="SubjectName">Subject Name </label></td>
							<td>
								<input type="text" name="subject_name">
							</td>
						</tr>

						<tr>
							<td><label for="CourseName">Course Name </label></td>
							<td>
								<select name="course_id" class="form-control">
									<option value="">--Select Course--</option>
								  	
									<?php
										include 'connection.php';

										$result = mysql_query("SELECT * FROM course");

										while($row = mysql_fetch_array($result)){
											echo "<option value='$row[course_id]'>" .$row['course_name']. "</option>";
										}
									?>
								</select>
							</td>
						</tr>

						<tr>
							<td><label for="TeacherName">Teacher Name </label></td>
							<td>
								<select name="teacherr_id" class="form-control">
									<option value="">--Select Teacher--</option>
								  	
									<?php
										include 'connection.php';

										$result = mysql_query("SELECT teacher_id, teacher_name FROM teacher");

										while($row = mysql_fetch_array($result)){
											echo "<option value='$row[teacher_id]'>" .$row['teacher_name']. "</option>";
										}
									?>
								</select>
							</td>
						</tr>
					
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-success" value="Save Subject" name="submit"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<!--pop up box for edit data-->
		<div id="popup1" class="overlay">
			<div class="popup">
				<h4 style="color: green">Edit Room</h4> <hr>
				<a class="close" href="#">&times;</a>
					<div class="content">
						
					</div>
			</div>
		</div>

	</div>
	<!--pop up box for edit data-->
	<script>
		$('.modalLink').click(function(){
		    var dataId=$(this).attr('data-id');
		    $.ajax({url:"edit_subject.php?dataId="+dataId,cache:false,success:function(result){
		        $(".content").html(result);
		    }});
		});
	</script>

	<script>
	  $(document).ready(function () {
	    var mySelect = $('#first-disabled2');

	    $('#special').on('click', function () {
	      mySelect.find('option:selected').prop('disabled', true);
	      mySelect.selectpicker('refresh');
	    });
	  });
	</script>
</body>
</html>