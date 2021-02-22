<?php
		require_once('connection.php');

		if (isset($_POST['sl_upload'])) {
		 		
		 		$title = $_POST['title'];
		 		$description = $_POST['description'];
		 		$is_deleted = 0;

		 		$query = "INSERT INTO student_level(title,description,is_deleted) VALUES('$title','$description',$is_deleted)";
		 		$result = mysqli_query($con,$query);

		 		if ($result) {
		 			
		 			header("Location:../admin/studentLevels.php?msg=505");
		 		}
		 		else
		 			header("Location:../admin/studentLevels.php?msg=507");

		 } 
 ?>