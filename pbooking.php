<?php
	require ('connection/connection.php');
	include ('header.php');
	if(isset($_SESSION['id']))
	{}
	else header("location:workerlogin.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Previous Booking</title>
	<link rel="stylesheet" href="css/previousbooking.css">
</head>
<body text="#653d17" bgcolor="#f1e8d7" alink="#222e46" vlink="#222e46">
<center>
	<h1>Previous Bookings</h1>
	<table width=900>
		<tr>
			<th>Customer Name</th>
			<th>Customer Address</th>
			<th>Customer Phone</th>
			<th>Status</th>
		</tr>
		<?php 	
			$que="select * from booking where wid='".$_SESSION['id']."' and status='completed'";
			$a=mysqli_query($con,$que);
           	while ($row = mysqli_fetch_array($a)) {        		
				?>
				<tr>
					<td><?php echo $row['cname']; ?></td>
					<td><?php echo $row['caddress']; ?></td>
					<td><?php echo $row['cphone']; ?></td>
					<td><?php echo $row['status'];?></td>
				</tr>
				<?php 
			}	 ?>
	</table>
</center>
</body>
</html>