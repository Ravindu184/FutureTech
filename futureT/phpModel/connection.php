<?php
		$server ="localhost";
		$user= "root";
		$password = "";
		$db = "edu";

		$con = mysqli_connect($server,$user,$password,$db);

		if (!$con) {
			die("Unable to Connect");
		}
		
 ?>