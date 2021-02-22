<?php
		require_once('connection.php');

		if (isset($_POST['slc_upload'])) {
		 	
		 	$id = $_POST['cntl_id'];
		 	$title = $_POST['title'];
		 	// $description = $_POST['description'];
		 	// $owner = $_POST['owner_name'];

		 	$query = "UPDATE student_level SET title='$title' WHERE id=$id";
		 	$result = mysqli_query($con,$query);

		 	if($result) {
		 		header("Location:../admin/editstudentLevel.php?msg=505");
		 	}
		 	else
		 		header("Location:../admin/editstudentLevel.php?msg=507");
		 }  
 ?>