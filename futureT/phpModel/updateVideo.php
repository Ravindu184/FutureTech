<?php
		require_once('connection.php');

		if (isset($_POST['update_video'])) {
		 	
		 	$id = $_POST['video_id'];
		 	$title = $_POST['title'];
		 	$description = $_POST['description'];
		 	$video_link = $_POST['video_link'];
		 	$owner = $_POST['owner_name'];

		 	if (!empty(trim($title)) && !empty(trim($description)) && !empty(trim($video_link)) && !empty(trim($owner))) {
		 		
		 		$query = "UPDATE video SET title='$title',description='$description',video_link='$video_link',owner='$owner' WHERE id='$id'";
		 		$result = mysqli_query($con,$query);

		 		if ($result) {
		 			header("Location:../admin/edituploadvideo.php?msg=505");
		 		}
		 		else
		 			header("Location:../admin/edituploadvideo.php?msg=507");
		 	}
		 } 
 ?>
