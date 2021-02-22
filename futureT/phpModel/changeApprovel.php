<?php
		require_once('connection.php');

		if (isset($_POST['change_approvel'])) {
		 		
		 	  $id = $_POST['student_id'];	
		 	  $is_approved = $_POST['get_approvel'];

		 	  if ($is_approved == "yes") {
		 	  		$query = "UPDATE student SET is_approved=1 WHERE id=$id";
		 	  		$result = mysqli_query($con,$query);

		 	  		if ($result) {
		 	  			header("Location:../admin/studentapprovel.php?msg=505");
		 	  		}
		 	  		else
		 	  			header("Location:../admin/studentapprovel.php?msg=507");	
		 	  }
		 	  else
		 	  {
		 	  		$query = "UPDATE student SET is_approved=0 WHERE id=$id";
		 	  		$result = mysqli_query($con,$query);

		 	  		if ($result) {
		 	  			header("Location:../admin/studentapprovel.php?msg=505");
		 	  		}
		 	  		else
		 	  			header("Location:../admin/studentapprovel.php?msg=507");
		 	  }	
		 } 
 ?>