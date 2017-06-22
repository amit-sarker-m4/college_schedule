<?php 
	include 'navbar.php';
?>

<?php
	include 'connection.php';

	if(isset($_POST['submit'])){

		$t_id = $_POST['t_id'];
		$name = $_POST['name'];
		$qulifi = $_POST['qulifi'];
		$dept = $_POST['dept'];

		$update = mysql_query("UPDATE teacher SET teacher_name='$name', qualification='$qulifi', department='$dept' WHERE teacher_id='$t_id' ");
		if($update){
			echo "<script type='text/javascript'>
					alert('Data has been Updated !'); 
				</script>";
		}else{
			echo "<script type='text/javascript'>
					alert('Not Updated !'); 
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
				<button type="submit" class="btn btn-default" id="addbtn" style="margin-bottom: 5px;"><i class="fa fa-plus" aria-hidden="true" style="color:green"></i> Add Teacher</button>
				
				<button type="submit" class="btn btn-default" style="display:none" id="viewbtn"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i> View Teacher</button>
			</div>
			
			<div id="view_subject">
			<h4 style="color:green">List of Teachers</h4>
				<form action="teacher.php" method="post">
					
					<table class="table table-striped">
					  <tr>
						<th>Teacher Id</th>
						<th>Photo</th>
						<th>Teacher Code</th>
						<th>Teacher Name</th>
						<th>Qualification</th>
						<th>Department</th>
						<th>Options</th>	
					  </tr>

					  	<?php
					  		include 'connection.php';

					  		$result = mysql_query("SELECT * FROM teacher");

					  		while($row = mysql_fetch_array($result)){
					  			$id = $row['teacher_id'];
					  			echo "<tr>";
					  			echo "<td>" .$row['teacher_id']. "</td>";

					  			//echo "<td>" .$row['teacher_image']. "</td>";

					  			echo "<td>";?> <img src="img/<?php echo $row['teacher_image']; ?>" height="40" width="43" style="border-radius: 20px"> <?php echo "</td>";

					  			echo "<td>" .$row['teacher_code']. "</td>";
					  			echo "<td>" .$row['teacher_name']. "</td>";	

					  			echo "<td>" .$row['qualification']. "</td>";
					  			echo "<td>" .$row['department']. "</td>";

					  			echo "<td><a href='#popup1' data-id='$id' class='modalLink'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true' style='color:green'></i></a>

					  				<a href='delete_teacher.php?teacher_id=$row[teacher_id]'><i class='fa fa-trash-o fa-lg' aria-hidden='true' style='color:red'></i></a></td>";
								echo "</tr>";


					  		}
					  			echo "<tr>";
									echo "<td style='text-align: center'><a href='pdf6.php' target='_blank' class='btn btn-success'>PDF</a> <td>";
								echo "</tr>";
					 	?>
					</table>
				</form>	
			</div>
		</div>
		<div id="add_form" style="display:none">
		<h4 style="color:green">Add New Teachers</h4> <hr />
			<div id="inner">
				<form action="add_teacher.php" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td><label for="TeacherCode">Teacher Code </label></td>
							<td><input type="text" name="teacher_code"></td>
						</tr>
						<tr>
							<td><label for="TeacherName">Teacher Name </label></td>
							<td><input type="text" name="teacher_name"></td>
						</tr>
						<tr>
							<td><label for="TeacherImage">Teacher Image </label></td>
							<td><input type="file" name="file"></td>
						</tr>
						<tr>
							<td><label for="Qualification">Qualification </label></td>
							<td><input type="text" name="qualification"></td>
						</tr>
						<tr>
							<td><label for="Department">Department </label></td>
							<td><input type="text" name="department"></td>
						</tr>
						<tr>
							<td><label for="Subject">Subject </label></td>
							<td>
								<select name="subject_id" class="form-control">
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
							<td><label for="Password">Password </label></td>
							<td><input type="text" name="password"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-success" value="Save Teacher" name="submit"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>

		<!--pop up box for edit data-->
		<div id="popup1" class="overlay">
			<div class="popup">
				<h4 style="color: green">Edit Teacher Info</h4> <hr>
				<a class="close" href="#">&times;</a>
					<div class="content">
						
					</div>
			</div>
		</div>
	</div>

	<script>
		$('.modalLink').click(function(){
		    var dataId=$(this).attr('data-id');
		    $.ajax({url:"edit_teacher.php?dataId="+dataId,cache:false,success:function(result){
		        $(".content").html(result);
		    }});
		});
	</script>
</body>
</html>