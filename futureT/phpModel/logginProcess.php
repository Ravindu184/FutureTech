<?php
		require_once('connection.php');
		session_start(); 

		$user_name;
		$password;
		$account_type;

		if (isset($_POST['login'])) {
			
			$user_name =$_POST['user_name'];
			$password = $_POST['password'];
			$account_type = $_POST['account_type'];

			$pwd = sha1($password);

			if ($account_type == "Admin") {
				$query = "SELECT *FROM admin WHERE user_name='$user_name' AND password='$pwd' AND is_approved=1 AND is_deleted=0;";
				$result = mysqli_query($con,$query);

				if (mysqli_num_rows($result) >0) {
					$row = mysqli_fetch_assoc($result);
					$_SESSION['user_id']=$row['id'];
					$_SESSION['name']=$row['name'];
					header("Location:../admin/admin.php");
				}
				else
					header("Location:../loggin/signin.php?msg=504");
			}
			else
			{
				$query = "SELECT * FROM student WHERE user_name='$user_name' AND password='$pwd' AND is_approved=1 AND is_deleted=0";
				$result = mysqli_query($con,$query);

				if (mysqli_num_rows($result) > 0) {
					
					$row = mysqli_fetch_assoc($result);
					$_SESSION['user_id']=$row['id'];
					$_SESSION['first_name']=$row['first_name'];
					$_SESSION['last_name']=$row['last_name'];
					$_SESSION['user_type'] = $row['account_type'];
					header("Location:../student/dashboad.php");
				}
			}	
		}
 ?>