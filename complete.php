<?php
	require ('connection/connection.php');	
	$cid=$_GET['var'];
	$wid=$_SESSION['id'];
	
	if(isset($_SESSION['id']))
	{}
	else header("location:workerlogin.php");
	$sql="update booking set status='completed' where cid='".$cid."' and wid='".$wid."'";
	if(mysqli_query($con,$sql))
	{		
		header('location:worafterlogin.php');
	}
	else echo mysqli_query($con);
?>