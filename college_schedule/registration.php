<?php
	include 'db/connection.php';

	$u_name = $_POST['user_name'];
	$roll = $_POST['roll'];
	$group = $_POST['group'];
	$password = $_POST['password'];

	if (isset($_POST['submit'])) {
		
		$result = mysql_query("INSERT INTO student(user_name, roll, stu_group, password) VALUES('$u_name', '$roll', '$group', '$password')");

		if ($result) {
			echo "<script type='text/javascript'>alert('Registration Completed!'); 
					 window.location.replace(\"index.php\");
			</script>";
		}else{
			echo "<script type='text/javascript'>alert('Oops ! There is an error !');
					 window.location.replace(\"index.php\");
			 </script>";
		
		}
	}
?>