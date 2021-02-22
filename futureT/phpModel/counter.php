<?php
		require_once('connection.php');

		$number_of_students = 0;
		$number_of_videos = 0;
		$number_of_notes = 0;
		$number_of_papers = 0;
		$number_of_online_lessons = 0; 


		$query = "SELECT count(id) FROM student WHERE is_approved=1 AND is_deleted = 0";
		$result = mysqli_query($con,$query);

		if ($result) {
			
			$row = mysqli_fetch_assoc($result);
			$number_of_students = $row['count(id)'];
		}

		$query = "SELECT count(id) FROM video WHERE  is_deleted = 0";
		$result = mysqli_query($con,$query);

		if ($result) {
			
			$row = mysqli_fetch_assoc($result);
			$number_of_videos = $row['count(id)'];
		}

		$query = "SELECT count(id) FROM note WHERE  is_deleted = 0";
		$result = mysqli_query($con,$query);

		if ($result) {
			
			$row = mysqli_fetch_assoc($result);
			$number_of_notes = $row['count(id)'];
		}

		$query = "SELECT count(id) FROM paper WHERE  is_deleted = 0";
		$result = mysqli_query($con,$query);

		if ($result) {
			
			$row = mysqli_fetch_assoc($result);
			$number_of_papers = $row['count(id)'];
		}
 ?>

