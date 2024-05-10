<?php
	if(isset($_SESSION['id']))
	{}
	else header("location:customerlogin.php");
	require ('connection/connection.php');
	include('header.php');
	$workname=$_GET['wnme'];
	$workerid=$_GET['wid'];
	$workerphone=$_GET['wphone'];
	$woek=$_GET['wk'];
	$query="insert into booking values ('".$_SESSION['id']."','".$_SESSION['uname']."','".$_SESSION['phone']."','".$_SESSION['address']."','".$workerid."','".$workname."','".$woek."','".$workerphone."','pending')";
	
	if(!mysqli_query($con,$query))
	{
		echo mysqli_error($con);	
	}

?>