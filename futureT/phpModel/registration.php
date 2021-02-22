<?php
		require_once('connection.php');

		$first_name;
		$last_name;
		$contact;
		$email;
		$whatsapp;
		$district;
		$province;
		$account_type;
		$home_city;
		$user_name;
		$password;
		$con_password;
		$pwd;

		if(isset($_POST['submit']))
		{
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$contact = $_POST['contact'];
			$email = $_POST['email'];
			$whatsapp = $_POST['whatsapp_no'];
			$district = $_POST['district'];
			$province = $_POST['province'];
			$account_type = $_POST['account_type'];
			$home_city = $_POST['home_city'];
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];
			$con_password = $_POST['con_password'];

			if ($password != $con_password) {
				header('Location: ../loggin/signup.php?msg=408');
			}
			else
			{
				$pwd =sha1($password);
				$query="INSERT INTO student(first_name,last_name,contact,email,whatsapp_no,district,province,account_type,home_city,user_name,password,is_approved,is_deleted) VALUES('$first_name','$last_name','$contact','$email','$whatsapp','$district','$province','$account_type','$home_city','$user_name','$pwd',0,0)";

				$result = mysqli_query($con,$query);

				if ($result) {
					header('Location: ../loggin/signup.php?msg=412');
				}
				else
					header('Location: ../loggin/signup.php?msg=416');
			}	
		} 
 ?>