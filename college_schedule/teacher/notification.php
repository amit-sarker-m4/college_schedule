<?php
	session_start();

	include 'connection.php';
		

	if(!isset($_SESSION["sess_user"])){
	
		header("location:index.php");
	}else{

?>


<form action="">
	<table class="table table-hover">
								
		<?php
			include 'connection.php';

				$res = mysql_query("SELECT request.status, teacher.teacher_name, request.for_day, request.teacher_id FROM request, teacher WHERE request.teacher_id=teacher.teacher_id && request.status='accepted' && request.sessionid='$_SESSION[sess_user]' ");
				
				$res22 = mysql_query("SELECT request.status, teacher.teacher_name, request.for_day, request.teacher_id FROM request, teacher WHERE request.teacher_id=teacher.teacher_id && request.status='rejected' && request.sessionid='$_SESSION[sess_user]' ");

				while($row = mysql_fetch_array($res)){
					echo "<tr>";
						echo "<td>"."Your request ".$row['status']." for ".$row['for_day']." ( ".$row['teacher_name']." )". "</td>";


						echo "<td><a href='#' class='btn btn-default'><i class='fa fa-times fa-lg' aria-hidden='true' style='color: red'></i></a></td>";
					echo "</tr>";
				}
				
				while($row22 = mysql_fetch_array($res22)){
					echo "<tr>";
						
						echo "<td>"."Your request ".$row22['status']." for ".$row22['for_day']." ( ".$row22['teacher_name']." )". "</td>";


						echo "<td><a href='#' class='btn btn-default'><i class='fa fa-times fa-lg' aria-hidden='true' style='color: red'></i></a></td>";
					echo "</tr>";
				}
		?>

	</table>
</form>

<?php
}
?>