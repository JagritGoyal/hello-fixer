<?php
	require ('connection/connection.php');
	include('header.php');
	if(isset($_SESSION['id']))
	{}
	else header("location:workerlogin.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Worker Login</title>
	<style>
		tr{
			text-align:center;
		}
		body{
			font-size:20px;
		}
	</style>
</head>
<body>
	<center>
	<h1 style="margin-top:-2px;">Current Bookings</h1>
	<table width=800>
		<tr>
			<th>Customer Name</th>
			<th>Customer Address</th>
			<th>Customer Phone</th>
			<th></th>
		</tr>
		<?php 	
			$que="select * from booking where wid='".$_SESSION['id']."'and status ='pending'";
			$a=mysqli_query($con,$que);
           	while ($row = mysqli_fetch_array($a)) {		
				?>
				<tr>
					<td><?php echo $row['cname']; ?></td>
					<td><?php echo $row['caddress']; ?></td>
					<td><?php echo $row['cphone']; ?></td>
					<td><a href="complete.php ? var=<?php  echo $row['cid'];?>">Mark as Done</a></td>
				</tr>
				<?php 
			}	 ?>
	</table>
	</center>
</body>
</html>