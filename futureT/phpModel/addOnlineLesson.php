<?php
		require_once('connection.php');

		if (isset($_POST['o_upload'])) {
		 		
		 		$lesson_name = $_POST['lesson_name'];
		 		$description = $_POST['description'];
		 		$student_level = $_POST['student_level'];
		 		$date = $_POST['d_date'];
		 		$time = $_POST['d_time'];
		 		$lesson_link = $_POST['lesson_link'];

		 		$query = "INSERT INTO online_lessons(lesson_name,description,student_level,d_date,d_time,lesson_link,is_deleted) VALUES('$lesson_name','$description','$student_level','$date','$time','$lesson_link',0)";

		 		$result = mysqli_query($con,$query);

		 		if ($result) {
		 			
		 			header("Location:../admin/uploadonlinelessons.php?msg=505");
		 		}
		 		else
		 			header("Location:../admin/uploadonlinelessons.php?msg=507");
		 } 
 ?>
