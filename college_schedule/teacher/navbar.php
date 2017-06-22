<?php
	session_start();

	include 'connection.php';
		

	if(!isset($_SESSION["sess_user"])){
	
		header("location:index.php");
	}else{

?>

<?php
	include 'connection.php';
	if(isset($_POST['save'])){

		$t_id = $_POST['t_id'];
		$code = $_POST['code'];
		$password = $_POST['password'];

		$update = mysql_query("UPDATE teacher SET password='$password' WHERE teacher_code='$t_id' ");
		if($update){
			echo "<script> alert('Updated Successfully');
				window.location.replace(\"dashboard.php\");
			</script> ";

		}else{
			echo "<script> alert('Not Updated');
				window.location.replace(\"dashboard.php\");
			</script> ";
		}

	}

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
	<link rel="stylesheet" href="css/popup.css">
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
		$("#notificationContainer").click(function(){
		return false;
		});

	});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$('#notificationsBody').load('notification.php')
				
			},1000); //1 second por load nibe
			
		});

	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$('#notification_number').load('notification_number.php')
				
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
			top: 4px;
			left: 23px;
			font-family: serif;
		}

		footer{
		position: fixed;
		width: 100%;
		bottom: 0px;
		height:60px;
		background-color: #D1D1D1;
		left:0px;
		right:0px;
	}
	
	</style>
	
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#" style="color:green"><i class="fa fa-university" aria-hidden="true"> Dhaka Boys College</i></a>
		</div>
		<ul class="nav navbar-nav">
		  <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"> Home</i></a></li>
		  <li><a href="change_schedule.php"><i class="fa fa-pencil-square-o" aria-hidden="true"> Change Schedule</i></a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		  <li><a href="#notification" id="notificationLink"><i class="fa fa-bell" aria-hidden="true"> </i> 
		  	<div id="notification_number">
			<!--?php
				include 'connection.php';
				$sql=mysql_query("select * from request where status='accepted' ");
				$comment_count=mysql_num_rows($sql);
				if($comment_count!=0)
				{
				echo '<span id="mes">'.$comment_count.'</span>';
				}
			?-->
			</div>
		  </a>

				<div id="notificationContainer">
					<div id="notificationTitle" style="color:green">Notifications</div>
					<div id="notificationsBody" class="notifications">
						<!--Notification will be here though notification.php-->
					</div>
					<div id="notificationFooter"><a href="notification.php">See All</a></div>
				</div>

			</li>

			<li><a href="#"><i class="fa fa-user" aria-hidden="true"> Welcome <?=$_SESSION['sess_user'];?></i></a></li>

			<li><a href="#popup1" data-id="<?=$_SESSION['sess_user'];?>" class="modalLink"><i class="fa fa-cog" aria-hidden="true"> </i></a></li>

		  <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"> LogOut</i></a></li>
		</ul>
	  </div>
	</nav>

	<!--pop up box for edit data-->
	<div id="popup1" class="overlay">
		<div class="popup">
			<h4 style="color: green">Change Password</h4> <hr>
			<a class="close" href="#">&times;</a>
				<div class="content">
						
				</div>
		</div>
	</div>

	<script>
		$('.modalLink').click(function(){
		    var dataId=$(this).attr('data-id');
		    $.ajax({url:"change_password.php?dataId="+dataId,cache:false,success:function(result){
		        $(".content").html(result);
		    }});
		});
	</script>
	
</body>
</html>
<?php
}
?>