<?php 
		include_once('../phpModel/connection.php');

		if (isset($_GET['p_code'])) {
			
			$id=$_GET['p_code'];

			$query="SELECT *FROM paper WHERE id=$id";
			$result=mysqli_query($con,$query);

			if ($result) {
				$list=mysqli_fetch_assoc($result);
				$file="../admin/uploads/papers/".$list['paper_file'];
				header("Content-type:application/pdf");
				header('Content-Disposition:attachment;filename=downloaded.pdf');
				readfile($file);

				
			}
		}
 ?>