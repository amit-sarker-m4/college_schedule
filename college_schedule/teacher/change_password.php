<?php
	session_start();

	include 'connection.php';
		

	if(!isset($_SESSION["sess_user"])){
	
		header("location:index.php");
	}else{

?>
<form action="navbar.php" method="post">
	<table>
		<?php
		
								
		$x = $_GET['dataId'];
		$result = mysql_query("SELECT teacher_code, password FROM teacher where teacher_code='$x'");
								
		while($row = mysql_fetch_array($result)){
									
		$code=$row['teacher_code'];
		$password=$row['password'];
			
			echo "<input type='text' name='t_id' value='$x' hidden/>";

		echo "<tr>";
			echo "<td><input type='text' name='code' value='$code' readonly/></td>";
		echo "</tr>";

		echo "<tr>";
			echo "<td><input type='text' name='password' value='$password' /></td>";
		echo "</tr>";

		echo "<tr>";
			echo "<td><input type='submit' name='save' value='Save'/> </td>";
		echo "</tr>";
									
		}
		?>
											
	</table>
</form>
<?php
}
?>

