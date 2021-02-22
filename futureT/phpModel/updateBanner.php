<?php 
		require_once('connection.php');

		if (isset($_POST['ub_upload'])) {
		 	
		 	$id = $_POST['banner_id'];
		 	$student_level= $_POST['student_level'];
		 	

		 	$query = "UPDATE banner SET student_level='$student_level' WHERE id=$id";
		 	$result = mysqli_query($con,$query);

		 	if($result) {
		 		header("Location:../admin/edituploadbanners.php?msg=505");
		 	}
		 	else
		 		header("Location:../admin/edituploadbanners.php?msg=507");
		 } 

 ?>