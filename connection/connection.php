<?php
	session_start();
	$con=mysqli_connect("localhost","root","","hellofixer");
	if(!$con)
	{
		echo "Connection Failed";
	}
?>