<?php
	require ('connection/connection.php');
	include('header.php');
	if(isset($_SESSION['uname']))
	{}
	else header("location:customerlogin.php");
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
			<th>Worker Id</th>
			<th>Worker Name</th>
			<th>Work</th>
			<th>Worker Phone</th>
			<th>Status</th>
		</tr>
		<?php 	
			$que="select * from booking where cid='".$_SESSION['id']."'";
			$a=mysqli_query($con,$que);
			while ($row = mysqli_fetch_array($a)) {        		
				?>
				<tr>
					<td><?php echo $row['wid']; ?></td>
					<td><?php echo $row['wname']; ?></td>
					<td><?php echo $row['work']; ?></td>
					<td><?php echo $row['wphone']; ?></td>
					<td><?php echo $row['status'];?></td>
				</tr>
				<?php 
			}	 ?>
	</table>
</center>
</body>
</html>