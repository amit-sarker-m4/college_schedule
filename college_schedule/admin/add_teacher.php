<!--?php
	include 'connection.php';

	$code = $_POST['teacher_code'];
	$name = $_POST['teacher_name'];
	//$image = $_POST['teacher_image'];
	$qualifi = $_POST['qualification'];
	$dept = $_POST['department'];

	$sub = $_POST['subject_id'];

	$pass = $_POST['password'];

	

	if(isset($_POST['submit'])){

		move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$_FILES["file"]["name"]);
           $image = $_FILES["file"]["name"];
		
		$result = mysql_query("INSERT INTO teacher (teacher_code, teacher_name, teacher_image, qualification, department, subject_id, password) VALUES ('$code', '$name', '$image', '$qualifi', '$dept', '$sub', '$pass')");


		if($result){
			echo "<script type='text/javascript'>alert('Data has been saved !'); 
					 window.location.replace(\"teacher.php\");
			</script>";
		}else{
			echo "<script type='text/javascript'>alert('Oops ! There is an error !'); </script>";
		}
	}

?-->

<?php
	include 'connection.php';

	$code = $_POST['teacher_code'];
	$name = $_POST['teacher_name'];
	//$image = $_POST['teacher_image'];
	$qualifi = $_POST['qualification'];
	$dept = $_POST['department'];

	$sub = $_POST['subject_id'];

	$pass = $_POST['password'];

	$result = mysql_query("SELECT teacher_code, teacher_name, qualification, department, subject_id, password FROM teacher WHERE teacher_code='$code' && password='$pass' || teacher_code='$code' ");
	$num_rows = mysql_num_rows($result);

	if ($num_rows==1) {
		echo "<script type='text/javascript'>alert('Data already exists! try again'); 
						 window.location.replace(\"teacher.php\");
				</script>";
	}else{
		if(isset($_POST['submit'])){

			move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$_FILES["file"]["name"]);
           $image = $_FILES["file"]["name"];
			
			$insert = mysql_query("INSERT INTO teacher (teacher_code, teacher_name, teacher_image, qualification, department, subject_id, password) VALUES ('$code', '$name', '$image', '$qualifi', '$dept', '$sub', '$pass')");
			
			if($insert){
				echo "<script type='text/javascript'>alert('Data has been saved !'); 
						 window.location.replace(\"teacher.php\");
				</script>";
			}else{
				echo "<script type='text/javascript'>alert('Not saved !'); 
						 window.location.replace(\"teacher.php\");
				</script>";
			}
			
		}
	}
?>