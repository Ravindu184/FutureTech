<?php 
		include_once('../phpModel/connection.php');

		if (isset($_GET['v_code'])) {
			
			$id=$_GET['v_code'];

			$query="SELECT *FROM note WHERE id=$id";
			$result=mysqli_query($con,$query);

			if ($result) {
				$list=mysqli_fetch_assoc($result);
				$file="../admin/uploads/notes/".$list['note_file'];
				header("Content-type:application/pdf");
				header('Content-Disposition:attachment;filename=downloaded.pdf');
				readfile($file);

				
			}
		}
 ?>