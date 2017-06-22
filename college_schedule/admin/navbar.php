<?php
	session_start();

	include 'connection.php';
		

	if(!isset($_SESSION["sess_user"])){
	
		header("location:index.php");
	}else{

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Timetable generator for Dhaka Boys college</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="css/message.css">
	<script src="js/jquery.js"></script>
	<script type="text/javascript" >
	$(document).ready(function(){
		$("#notificationLink").click(function(){
			$("#notificationContainer").toggle(300);
			return false;
		});

		
		//Document Click
		$(document).click(function(){
		$("#notificationContainer").hide();
		});


		//Popup Click
		//$("#notificationContainer").click(function(){
		//return false;
		//});
	});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$('#notificationsBody').load('message.php')
				
			},1000); //1 second por load nibe
			
		});

	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$('#message_number').load('message_number.php')
				
			},1000); //1 second por load nibe
			
		});

	</script>

	<style>
		#mes{
		padding: 0px 3px;
		border-radius: 2px 2px 2px 2px;
		background-color: rgb(240, 61, 37);
		font-size: 9px;
		font-weight: bold;
		color: #fff;
		position: absolute;
		top: 3px;
		left: 23px;
		font-family: serif;
		}
		
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#" style="color:green"><i class="fa fa-university" aria-hidden="true"> Dhaka Boys College </i></a>
		</div>
		<ul class="nav navbar-nav">
		  <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"> Home</i></a></li>
		  <li><a href="schedule.php"><i class="fa fa-table" aria-hidden="true"> Schedule</i></a></li>
		  <li><a href="subject.php"><i class="fa fa-book" aria-hidden="true"> Subject</i></a></li>
		  <li><a href="teacher.php"><i class="fa fa-user" aria-hidden="true"> Teacher</i></a></li>
		  <li><a href="course.php"><i class="fa fa-graduation-cap" aria-hidden="true"> Course</i></a></li>
		  <li><a href="timing.php"><i class="fa fa-clock-o" aria-hidden="true"> Timing</i></a></li>
		  <li><a href="room.php"><i class="fa fa-bed" aria-hidden="true"> Class Room</i></a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		  <li><a href="#message" id="notificationLink"><i class="fa fa-comments" aria-hidden="true"> </i> 
			
			<div id="message_number">	
				<!--?php
					include 'connection.php';
					$sql=mysql_query("select * from request where status='requested' ");
					$comment_count=mysql_num_rows($sql);
					if($comment_count!=0)
					{
					echo '<span id="mes">'.$comment_count.'</span>';
					}
				?-->
			</div>	
			</a>

				<div id="notificationContainer">
					<div id="notificationTitle" style="color:green">View Request</div>
					<div id="notificationsBody" class="notifications">
						<!--request message will be here though message.php file-->
					</div>
					<div id="notificationFooter"><a href="message.php" target="_blank">See All</a></div>
				</div>

			</li>
			<li><a href="#"><i class="fa fa-user" aria-hidden="true"> Welcome <?=$_SESSION['sess_user'];?></i></a></li>

		  <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"> LogOut</i></a></li>
		</ul>
	  </div>
	</nav>
</body>
</html>
<?php
}
?>