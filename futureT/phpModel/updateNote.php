<?php
		require_once('connection.php');

		if (isset($_POST['un_upload'])) {
		 	
		 	$id = $_POST['note_id'];
		 	$title = $_POST['title'];
		 	$description = $_POST['description'];
		 	$owner = $_POST['owner_name'];

		 	$query = "UPDATE note SET title='$title',description='$description',owner='$owner' WHERE id=$id";
		 	$result = mysqli_query($con,$query);

		 	if($result) {
		 		header("Location:../admin/edituploadnote.php?msg=505");
		 	}
		 	else
		 		header("Location:../admin/edituploadnote.php?msg=507");
		 } 
 ?>