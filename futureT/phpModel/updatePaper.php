<?php
		require_once('connection.php');

		if (isset($_POST['up_upload'])) {
		 	
		 	$id = $_POST['paper_id'];
		 	$title = $_POST['title'];
		 	$description = $_POST['description'];
		 	$owner = $_POST['owner_name'];

		 	$query = "UPDATE paper SET title='$title',description='$description',owner='$owner' WHERE id=$id";
		 	$result = mysqli_query($con,$query);

		 	if($result) {
		 		header("Location:../admin/edituploadpaper.php?msg=505");
		 	}
		 	else
		 		header("Location:../admin/edituploadpaper.php?msg=507");
		 } 
 ?>
