<?php
		require_once('connection.php');

		$title="";
		$description ="";
		$note_file= "";
		$owner_name="";

		if (isset($_POST['n_upload'])) {
		 	
			$title = $_POST['title'];
			$description = $_POST['description'];
			$owner_name = $_POST['owner_name'];
			$student_level = $_POST['student_level'];
			$note_file = $_FILES['note_file']['name'];
			
			$target_dir = "../admin/uploads/notes/";

			if ($note_file != '') {
				
				$target_file = $target_dir.basename($_FILES['note_file']['name']);
				$extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$extension_arr = array("jpg","doc","png","pdf");

				if (in_array($extension, $extension_arr)) {
					
					$image_base64 = base64_encode(file_get_contents($_FILES['note_file']['tmp_name']));
					$image = "data::image/".$extention."base64,".$image_base64;

					if (move_uploaded_file($_FILES['note_file']['tmp_name'], $target_file)) {
						
						$query = "INSERT INTO note(title,description,note_file,owner,student_level,is_deleted) VALUES('$title','$description','$note_file','$owner_name','$student_level',0)";
						$result = mysqli_query($con,$query);

						if ($result) {
							header("Location:../admin/uploadnote.php?msg=505");
						}
						else
							header("Location:../admin/uploadnote.php?msg=507");
					}
				}
			}
		} 
 ?>