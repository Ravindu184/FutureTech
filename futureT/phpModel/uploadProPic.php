<?php
		require_once('connection.php');

		if (isset($_POST['propic_upload'])) {
		 		$id = $_POST['user_id'];
		 		$file_name = $_FILES['profile_pic']['name'];
		 		$target_dir = "../student/uploads/pro_pic/";

		 		$query = "SELECT *FROM user_profile WHERE student_id = $id";
		 		$result = mysqli_query($con,$query);

		 		if (mysqli_num_rows($result) > 0) {
		 			
		 			if ($file_name != '') {
		 			
		 				$target_file = $target_dir.basename($_FILES['profile_pic']['name']);
						$extention = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						$extention_arr =array("jpg","jpeg","png","gif");

						if (in_array($extention, $extention_arr)) {
					
							$image_base64 = base64_encode(file_get_contents($_FILES['profile_pic']['tmp_name']));
							$image = "data::image/".$extention."base64,".$image_base64;

							if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
						
									$query = "UPDATE user_profile SET profile_pic='$file_name' WHERE student_id=$id";
									$result = mysqli_query($con,$query);

									if ($result) {
										header("Location:../student/studentMain.php?msg=505");
									}
									else
										header("Location:../student/studentMain.php?msg=507");
									}
							else
								echo "Location";
						}
		 			}
		 		}
		 		else
		 		{
		 			if ($file_name != '') {
		 			
		 				$target_file = $target_dir.basename($_FILES['profile_pic']['name']);
						$extention = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						$extention_arr =array("jpg","jpeg","png","gif");

						if (in_array($extention, $extention_arr)) {
					
							$image_base64 = base64_encode(file_get_contents($_FILES['profile_pic']['tmp_name']));
							$image = "data::image/".$extention."base64,".$image_base64;

							if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
						
								$query = "INSERT INTO user_profile(student_id,profile_pic,is_deleted) VALUES($id,'$file_name',0)";
								$result = mysqli_query($con,$query);

								if ($result) {
									header("Location:../student/studentMain.php?msg=505");
								}
								else
									header("Location:../student/studentMain.php?msg=507");
							}
							else
								echo "Location";
						}
		 			}
		 		}	
		 }

		 if (isset($_POST['change_p'])) {
		  		
		  		$id = $_POST['user_id'];
		  		$user_name = $_POST['user_name'];
		  		$password = $_POST['password'];
		  		$con_password = $_POST['con_password'];

		  		if (!empty(trim($user_name)) && !empty(trim($password)) && !empty(trim($con_password))) {
		  			
		  			if ($password == $con_password) {
		  				
		  				$pwd = sha1($password);
		  				$query = "UPDATE student SET user_name='$user_name',password='$pwd' WHERE id=$id";
		  				$result = mysqli_query($con,$query);

		  				if ($result) {
		  					header("Location:../student/studentMain.php?msg=505");
		  				}
		  				else
		  					header("Location:../student/studentMain.php?msg=507");
		  			}
		  			else
		  				header("Location:../student/studentMain.php?msg=509");
		  		}


		  		if (!(trim($user_name)) && empty($password) || empty($con_password)) {
		  			
		  			$query = "UPDATE student SET user_name='$user_name' WHERE id=$id";

		  			if ($result) {
		  					header("Location:../student/studentMain.php?msg=505");
		  				}
		  				else
		  					header("Location:../student/studentMain.php?msg=507");
		  		}
		  } 
 ?>