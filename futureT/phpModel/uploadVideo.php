<?php 
		require_once('connection.php');

		if (isset($_POST['v_upload'])) {
			
			$title = $_POST['title'];
			$description = $_POST['description'];
			$thubmail = $_FILES['thubmail']['name'];
			$owner = $_POST['owner_name'];
			$student_level = $_POST['student_level'];
			$video_link = $_POST['video_link'];
			$target_dir ="../admin/uploads/video/";

			if ($thubmail !='') {
				
				$target_file = $target_dir.basename($_FILES['thubmail']['name']);
				$extention = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$extention_arr =array("jpg","jpeg","png","gif");

				if (in_array($extention, $extention_arr)) {
					
					$image_base64 = base64_encode(file_get_contents($_FILES['thubmail']['tmp_name']));
					$image = "data::image/".$extention."base64,".$image_base64;

					if (move_uploaded_file($_FILES['thubmail']['tmp_name'], $target_file)) {
						
						$query = "INSERT INTO video(title,description,thubmail,video_link,owner,student_level,is_deleted) VALUES('$title','$description','$thubmail','$video_link','$owner','$student_level',0)";
						$result = mysqli_query($con,$query);

						if ($result) {
							header("Location:../admin/uploadvideo.php?msg=505");
						}
						else
							header("Location:../admin/uploadvideo.php?msg=507");
					}
					else
						echo "Location";
				}
				else
					echo "no";
			}
			else
				echo "no000";
		}
 ?>
