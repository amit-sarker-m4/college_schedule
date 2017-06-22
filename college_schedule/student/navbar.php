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
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#" style="color:green"><i class="fa fa-university" aria-hidden="true"> Dhaka Boys College </i></a>
		</div>
		<ul class="nav navbar-nav">
		  <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"> Home</i></a></li>
		  
		</ul>
		<ul class="nav navbar-nav navbar-right">

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