<?php
		require_once('connection.php');

		if (isset($_POST['update'])) {
		 	
		 	$id=$_POST['user_id'];
		 	$first_name =$_POST['first_name'];
            $last_name =$_POST['last_name'];
            $email=$_POST['email'];
            $contact=$_POST['contact'];
            $whatsapp=$_POST['whatsapp_no'];
            $district=$_POST['district'];
            $province=$_POST['province'];
            $account_type=$_POST['account_type'];
            $home_city=$_POST['home_city'];
            $user_name=$_POST['user_name'];
            $password = $_POST['password'];
            $con_password = $_POST['con_password'];

            if (empty(trim($password)) && empty(trim($con_password))) {
            	
            	$query = "UPDATE student SET first_name='$first_name',last_name='$last_name',contact='$contact',whatsapp_no='$whatsapp',district='$district',province='$province',account_type='$account_type',home_city='$home_city',user_name='$user_name' WHERE id=$id";
            	$result = mysqli_query($con,$query);
            	if ($result) {
            		header("Location:../admin/studentaccount.php?msg=505");
            	}
            }
            else
            {
            	if ($password == $con_password) {
            		$pwd = sha1($password);
            		$query = "UPDATE student SET first_name='$first_name',last_name='$last_name',contact='$contact',whatsapp_no='$whatsapp',district='$district',province='$province',account_type='$account_type',home_city='$home_city',user_name='$user_name',password='$pwd' WHERE id=$id";
            		$result = mysqli_query($con,$query);
            		if ($result) {
            			header("Location:../admin/studentaccount.php?msg=508");
            		}
            	}
            	else
            	{
            		header("Location:../admin/studentaccount.php?msg=507");
            	}	
            }			
		 } 
 ?>
