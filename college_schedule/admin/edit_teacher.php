<form action="teacher.php" method="post">
	<div id="main1" style="width: 100%">
		<?php
		include 'connection.php';
								
								
		$x = $_GET['dataId'];
		$result = mysql_query("SELECT * FROM teacher where teacher_id='$x'");
								
		while($row = mysql_fetch_array($result)){

		$id=$row['teacher_id'];							
		$code=$row['teacher_code'];
		$name=$row['teacher_name'];
		$teacher_image=$row['teacher_image'];							
		$qulifi=$row['qualification'];	
		$dept=$row['department'];	

		
	
				echo "<div style='width:30%; float:right'>";
					?> 

					<img src="img/<?php echo $row['teacher_image']; ?>" height="77" width="90" style="border-radius: 20px; margin-left: 20px;"> 
						
						<div id="name" style="width:80%; margin-left: 20px;font-weight: bold; font-size: 11px;">
							<?php echo $row['teacher_name']; ?>
						</div>
					<?php 
				echo "</div>";

				echo "<div style='width:70%; float:left'>";

					echo "<input type='text' name='t_id' value='$x' hidden/>";

					echo "<input type='text' name='id' value='$id' readonly/>"; 
					echo "<input type='text' name='code' value='$code' readonly/>"; 
				
					echo "<input type='text' name='name' value='$name'/>"; 
				
					echo "<input type='text' name='qulifi' value='$qulifi'/>"; 
				
					echo "<input type='text' name='dept' value='$dept'/>"; 
				
					echo "<input type='submit' name='submit' value='Save'/>"; 
				echo "</div>";
										
		}
		?>
							
								
	</div>
</form>


