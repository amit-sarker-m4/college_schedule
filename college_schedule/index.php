<?php
	include 'db/connection.php';

	// Student Login
	if (isset($_POST['stu_login'])) {

		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		$result = mysql_query("SELECT user_name, password FROM student WHERE user_name='$user_name' AND password='$password' ");

		$count = mysql_num_rows($result);

		if ($count == 1) {

			$uname=$user_name;
			session_start();
			$_SESSION['sess_user']=$uname;

			header("Location:student/dashboard.php");

		}else{
			echo "<script type='text/javascript'>alert('Wrong Name or Password !'); </script>"; 
		}
	}

	// Admin Login
	if (isset($_POST['admin_login'])) {

		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		$result = mysql_query("SELECT user_name, password FROM admin WHERE user_name='$user_name' AND password='$password' ");

		$count = mysql_num_rows($result);

		if ($count == 1) {

			$uname=$user_name;
			session_start();
			$_SESSION['sess_user']=$uname;

			header("Location:admin/dashboard.php");

		}else{
			echo "<script type='text/javascript'>alert('Wrong Name or Password !'); </script>"; 
		}
	}

	// Admin Login
	if (isset($_POST['teacher_login'])) {

		$teacher_code = $_POST['teacher_code'];
		$password = $_POST['password'];
		
		$result = mysql_query("SELECT teacher_code, password FROM teacher WHERE teacher_code='$teacher_code' AND password='$password' ");

		$count = mysql_num_rows($result);

		if ($count == 1) {

			$uname=$teacher_code;
			session_start();
			$_SESSION['sess_user']=$uname;

			header("Location:teacher/dashboard.php");

		}else{
			echo "<script type='text/javascript'>alert('Wrong Name or Password !'); </script>"; 
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Automated schedule generator for Dhaka Boys college</title>
	<link rel="shortcut icon" href="img/college.ico" type="image/x-icon">
	<link rel="stylesheet" href="admin/font-awesome/css/font-awesome.css">
	<style type="text/css">
		/*#main{
			background-image: url('img/college1.jpg');
		    width: 1366px;
		    height: 600px;
   			background-repeat: no-repeat;
    		background-attachment: fixed;
    		margin-left: auto; 
    		margin-right: auto;
    		margin-top: -8px;
    		margin-left: -8px;
    		height: 98vh;
		}*/
		body {
		  	background-image: url(img/college1.jpg);
		 	background-position: center center;
		 	background-repeat: repeat-x, repeat;
		 	background-attachment: fixed;
		 	background-size: cover;
		  
		}
		
		#header{
			width: 100%;
		    height: 10%;
		    top: 0;
		    background-color: #F1F2F4;
		    border-bottom: 1px solid green;
		    position: fixed;
		    left: 0px;
		    right: 0px;
		}

		#icon{
			width: 40px;
    		height: 45px;
    		border-radius:5px;
			/*background-color: white;
			border:1px solid green;*/
			transform: translate(100px, 32px);
		}
		#user_reg, #student_login, #admin_log, #teacher_log{
			background-color: rgba(255, 255, 255, 0.5);
		    position: absolute;
		    top: 20%;
		    left: 15%;
		    width: 20%;
		    height: 50%;
		    border-radius: 3px;
		    border:1px solid gray;
		}
		input, select{
			height: 24px;
			border-radius:3px;
			border: 1px solid green;
			text-indent: 5px;
		}
	</style>
	<script src="admin/js/jquery.js"></script>
	<script>
		$(document).ready(function(){
		    $("#reg_btn").click(function(){
		        $("#student_login").hide();
		        $("#user_reg").show();
		       
		    });

		    $("#log_btn").click(function(){
		        $("#student_login").show();
		        $("#user_reg").hide();
		         
		    });

		    $("#admin_btn").click(function(){
		        $("#student_login").hide();
		        $("#user_reg").hide();
		        $("#admin_log").show();
		         
		    });

		    $("#teacher_btn").click(function(){
		        $("#student_login").hide();
		        $("#user_reg").hide();
		        $("#admin_log").hide();
		        $("#teacher_log").show();
		         
		    });
		  
		});
		
	</script>
</head>
<body>
	<div id="main">
		<div id="header">

			<div id="icon">
				<!--i class="fa fa-table fa-2x" aria-hidden="true" style="color: green; margin-left: 5px; margin-top: 6px;"></i-->
				<img src="img/dbcl.jpg" alt="" width="55px" style="border-top-left-radius:7px; border-bottom-right-radius:7px">

			</div>
				<h3 style="width: 60%; text-indent: 12%; margin-top: -.7%; color:green"> Automated Schedule Generator For Dhaka Boys College</h3>
		</div>
		<!--Student LOGIN SECTION-->
		<div id="student_login">
			<form action="index.php" method="post">
				<table style="margin-left: auto; margin-right: auto; margin-top: 20%">

					<tr>
						<td><input type="text" name="user_name" placeholder="User Name" required> </td>
					</tr>

					<tr>
						<td><input type="password" name="password" placeholder="Password" required> </td>
					</tr>

					<!--tr>
						<td>
							<select name="role" id="role">
							    <option value="">Login as...</option>
								<option value="administrator">administrator</option> 
								<option value="teacher">teacher</option> 
								<option value="student">student</option> 
							</select>
						</td>
					</tr-->


					<tr>
						<td><input type="submit" name="stu_login" value="Login" style="background-color: green; cursor:pointer; color:white"> </td>
					</tr>

				</table>

			</form>

			<div id="user2" style="text-align: center; margin-top: 5px">
				<a href="#" style="color:black; font-weight: bold; text-decoration: none" id="admin_btn">Admin</a> 

				<a href="#" style="color:black; font-weight: bold; text-decoration: none; margin-left: 10px" id="teacher_btn">Teacher</a> 
			</div>

			<div id="user" style="text-align: center">
			 	<h5 style="font-family: sans-serif">New user? Registration here</h5>
				<a href="#" style="color:green" id="reg_btn"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i></a> 
			</div>
			
		</div>
		<!--Student REGISTRATION SECTION-->
		<div id="user_reg" style="display: none">
			<form action="registration.php" method="post">
				<table style="margin-left: auto; margin-right: auto; margin-top: 20%">
					<tr>
						<td><input type="text" name="user_name" placeholder="User Name" required> </td>
					</tr>

					<tr>
						<td><input type="text" name="roll" placeholder="Roll" required> </td>
					</tr>

					<tr>
						<td><input type="text" name="group" placeholder="Group" required> </td>
					</tr>

					<tr>
						<td><input type="password" name="password" placeholder="Password" required> </td>
					</tr>


					<tr>
						<td><input type="submit" name="submit" value="Save" style="background-color: green; cursor:pointer; color:white"> </td>
					</tr>

				</table>

			</form>
			
			<div id="user" style="text-align: center">
			 <h5 style="font-family: sans-serif">Already Registered? Login here</h5>
				<a href="#" style="color:green" id="log_btn"><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i></a>
			</div>
			
		</div>

		<!--Admin Login SECTION-->
		<div id="admin_log" style="display: none">
			<form action="index.php" method="post">
				<table style="margin-left: auto; margin-right: auto; margin-top: 20%">
					<tr>
						<td><input type="text" name="user_name" placeholder="User Name" required> </td>
					</tr>

					<tr>
						<td><input type="password" name="password" placeholder="Password" required> </td>
					</tr>


					<tr>
						<td><input type="submit" name="admin_login" value="Login" style="background-color: green; cursor:pointer; color:white"> </td>
					</tr>

				</table>

			</form>
			<div id="" style="text-align: center">
				<a href="index.php" style="color:black" id="log_btn">Go To Home</a>
			</div>
		</div>

		<!--Teacher Login SECTION-->
		<div id="teacher_log" style="display: none">
			<form action="index.php" method="post">
				<table style="margin-left: auto; margin-right: auto; margin-top: 20%">
					<tr>
						<td><input type="text" name="teacher_code" placeholder="Teacher Code" required> </td>
					</tr>

					<tr>
						<td><input type="password" name="password" placeholder="Password" required> </td>
					</tr>


					<tr>
						<td><input type="submit" name="teacher_login" value="Login" style="background-color: green; cursor:pointer; color:white"> </td>
					</tr>

				</table>

			</form>
			<div id="" style="text-align: center">
				<a href="index.php" style="color:black" id="log_btn">Go To Home</a>
			</div>
		</div>
	</div>
	
</body>
</html>