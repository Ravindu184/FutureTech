<?php
		require_once('connection.php');

		$title="";
		//$description ="";
		$banner_file= "";
		//$owner_name="";

		if (isset($_POST['b_upload'])) {
		 	
			$title = $_POST['title'];
			//$description = $_POST['description'];
			//$owner_name = $_POST['owner_name'];
			$student_level = $_POST['student_level'];
			$banner_file = $_FILES['banner_file']['name'];
			
			$target_dir = "../admin/uploads/banner/";

			if ($banner_file != '') {
				
				$target_file = $target_dir.basename($_FILES['banner_file']['name']);
				$extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$extension_arr = array("jpg","doc","png","pdf");

				if (in_array($extension, $extension_arr)) {
					
					$image_base64 = base64_encode(file_get_contents($_FILES['banner_file']['tmp_name']));
					$image = "data::image/".$extention."base64,".$image_base64;

					if (move_uploaded_file($_FILES['banner_file']['tmp_name'], $target_file)) {
						
						$query = "INSERT INTO banner(title,banner_file,student_level,is_deleted) VALUES('$title','$banner_file','$student_level',0)";
						$result = mysqli_query($con,$query);

						if ($result) {
							header("Location:../admin/uploadbanner.php?msg=505");
						}
						else
							header("Location:../admin/uploadbanner.php?msg=507");
					}
				}
			}
		} 
 ?>