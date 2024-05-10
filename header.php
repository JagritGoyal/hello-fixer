<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
  	<link rel="stylesheet" href="css/header.css">
</head>
<body text="#653d17" bgcolor="#f1e8d7" alink="#222e46" vlink="#222e46">
	<table>
		<tr>
			<td>
				<img src="Images/hellofixer!!.jpeg" height="120" width="300">
			</td>
			<td>
				<a href="" class="head_button" id="home">Home</a>
			</td>
			<td>
				<a id="profile" class="head_button"  href="">Profile</a>
			</td>
			<td>
				<a id="pbkng" class="head_button"  href="">Previous Booking</a>
			</td>
			<td>
				<a class="head_button"  href="logout.php">Log Out</a>
			</td>
		</tr>
	</table>
<hr color="#7d6960">
<br>
</body>
</html>
	
<?php
	if($_SESSION['utype']=='customer')
	{  
		echo "<script> document.getElementById('home').href='cusafterlogin.php';</script>";
		echo "<script> document.getElementById('profile').href='customerprofile.php';</script>";
		echo "<script> document.getElementById('pbkng').href='previousbooking.php';</script>";
	}
	else if($_SESSION['utype']=='worker')
	{  
		echo "<script> document.getElementById('home').href='worafterlogin.php';</script>";
	   	echo "<script> document.getElementById('profile').href='workerprofile.php';</script>";
	   	echo "<script> document.getElementById('pbkng').href='pbooking.php';</script>";
	}
?>
