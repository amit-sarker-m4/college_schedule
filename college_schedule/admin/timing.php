<?php 
	include 'navbar.php';
?>

<?php
	include '../db/connection.php';

	if(isset($_POST['save'])){

		$t_id = $_POST['t_id'];
		$name = $_POST['name'];

		$update = mysql_query("UPDATE lecture_timing SET Lecture_time='$name' WHERE lecture_timing_id='$t_id' ");
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
				<button type="submit" class="btn btn-default" id="addbtn" style="margin-bottom: 5px;"><i class="fa fa-plus" aria-hidden="true" style="color:green"></i> Add Timing</button>
				
				<button type="submit" class="btn btn-default" style="display:none" id="viewbtn"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i> View Timing</button>
			</div>
			
			<div id="view_subject">
			<h4 style="color:green">Lecture Timing</h4>
				<form action="timing.php" method="post">
					
					<table class="table table-striped">
					  <tr>
						<th>Timing Id</th>
						<th>Lecture Time</th>
						<th>Options</th>	
					  </tr>

					  	<?php
					  		include 'connection.php';

					  		$result = mysql_query("SELECT * FROM lecture_timing");

					  		while($row = mysql_fetch_array($result)){

					  			$id = $row['lecture_timing_id'];

						  		echo "<tr>";
							  	echo "<td>" .$row['lecture_timing_id']. "</td>";
							  	echo "<td>" .$row['Lecture_time']. "</td>";

							  	echo "<td><a href='#popup1' data-id='$id' class='modalLink'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true' style='color:green'></i></a>

									<a onclick='return confirm_alert(this);' href='delete_timing.php?lecture_timing_id=$row[lecture_timing_id]'><i class='fa fa-trash-o fa-lg' aria-hidden='true' style='color:red'></i></a> </td>";

							  	echo "</tr>";
						 	}
					  	?>
					</table>
				</form>	
			</div>
		</div>
		<div id="add_form" style="display:none">
		<h4 style="color:green">Add Lecture Timing</h4> <hr />
			<div id="inner">
				<form action="add_timing.php" method="post">
					<table>
						<tr>
							<td><label for="SubjectCode">Lecture Time </label></td>
							<td>
								<select name="Lecture_time" id="" class="">
									<option value="8-9am">8-9am</option>
									<option value="9-10am">9-10am</option>
									<option value="10-11am">10-11am</option>
									<option value="11-12am">11-12am</option>
									<option value="1-2pm">1-2pm</option>
									<option value="2-3pm">2-3pm</option>
									<option value="3-4pm">3-4pm</option>
									<option value="4-5pm">4-5pm</option>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-success" value="Save Timing" name="submit"></td>
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

	<script>
		$('.modalLink').click(function(){
		    var dataId=$(this).attr('data-id');
		    $.ajax({url:"edit_timing.php?dataId="+dataId,cache:false,success:function(result){
		        $(".content").html(result);
		    }});
		});
	</script>
</body>
</html>

<script>
//alert on delete
function confirm_alert(node) {
    return confirm("You are going to delete this subject. Click OK to continue or CANCEL to quit.");
}
</script>