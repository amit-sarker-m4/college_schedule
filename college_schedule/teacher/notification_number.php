<?php
	session_start();

	include 'connection.php';
		

	if(!isset($_SESSION["sess_user"])){
	
		header("location:index.php");
	}else{

?>
<?php
	include 'connection.php';
	$sql=mysql_query("SELECT status from request WHERE request.status='accepted' && request.sessionid='$_SESSION[sess_user]' ");
	$comment_count=mysql_num_rows($sql);
	if($comment_count!=0){
		echo '<span id="mes">'.$comment_count.'</span>';
	}
?>

<?php
}
?>