<?php
	
	$connection= mysqli_connect('localhost','root','root','channeling_system');
	
	if(mysqli_connect_errno()){
		die('Database connection faild'.mysqli_connect_error());
	}else{
		//echo "Connect";
	}


?>