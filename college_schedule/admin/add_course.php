<!--?php
	include 'connection.php';

	$name = $_POST['course_name'];
	$year = $_POST['year'];
	$section = $_POST['section'];
	$subject_id = $_POST['subject_id'];
	$teacher_id = $_POST['teacher_id'];

	if(isset($_POST['submit'])){

		$result = mysql_query("INSERT INTO course (course_name, year, section, subject_id, teacher_id) VALUES ('$name', '$year', '$section', '$subject_id', '$teacher_id')");

		if($result){
			echo "<script type='text/javascript'>alert('Data has been saved !'); 
					 window.location.replace(\"course.php\");
			</script>";
		}else{
			echo "<script type='text/javascript'>alert('Oops ! There is an error !'); </script>";
		}
	}


?-->


<?php
	include 'connection.php';

	$name = $_POST['course_name'];
	$year = $_POST['year'];
	$section = $_POST['section'];
	$subject_id = $_POST['subject_id'];
	$teacher_id = $_POST['teacher_id'];

	$result = mysql_query("SELECT * FROM course WHERE course_name='$name' && year='$year' && section='$section' && subject_id='$subject_id' && teacher_id='$teacher_id' ");
	$num_rows = mysql_num_rows($result);

	if ($num_rows==1) {
		echo "<script type='text/javascript'>alert('Data already exists! try again'); 
						 window.location.replace(\"course.php\");
				</script>";
	}else{
		if(isset($_POST['submit'])){
			
			$insert = mysql_query("INSERT INTO course (course_name, year, section, subject_id, teacher_id) VALUES ('$name', '$year', '$section', '$subject_id', '$teacher_id')");
			
			if($insert){
				echo "<script type='text/javascript'>alert('Data has been saved !'); 
						 window.location.replace(\"course.php\");
				</script>";
			}else{
				echo "<script type='text/javascript'>alert('Not saved !'); 
						 window.location.replace(\"course.php\");
				</script>";
			}
			
		}
	}
?>