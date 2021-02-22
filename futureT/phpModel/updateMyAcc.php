<?php
		require_once('connection.php');

		if (isset($_POST['update'])) {
		 	
		 	$u_id = $_POST['user_id'];
		 	$email = $_POST['email'];
		 	$contact = $_POST['contact'];
		 	$user_name = $_POST['user_name'];
		 	$password = $_POST['password'];
		 	$con_password = $_POST['con_password'];

		 	if (empty(trim($password)) && empty(trim($con_password))) {
		 		
		 		$query = "UPDATE admin SET email='$email',contact_no='$contact',user_name='$user_name' WHERE id=$u_id";
		 		$result = mysqli_query($con,$query);

		 		if ($result) {
		 			header("Location:../admin/myaccount.php?msg=505");
		 		}
		 	}
		 	else
		 	{
		 		if ($password == $con_password) {
					
					$pwd = sha1($password);
					$query = "UPDATE admin SET email='$email',contact_no='$contact',user_name='$user_name',password='$pwd' WHERE id=$u_id";
					$result = mysqli_query($con,$query);

		 			if ($result) {
		 				header("Location:../admin/myaccount.php?msg=508");
		 			} 	
		 		}
		 		else
		 				header("Location:../admin/myaccount.php?msg=507");
		 	}	
		 } 
 ?>