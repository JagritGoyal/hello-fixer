<?php
	session_start();
	if($_SESSION['utype']=='customer')
	{	
		unset($_SESSION['id']);
		session_destroy();
		header('location:customerlogin.php');
		die();
	}
	else if($_SESSION['utype']=='worker')
	{
		unset($_SESSION['id']);
		session_destroy();
		header('location:workerlogin.php');
		die();	
	}	
?>