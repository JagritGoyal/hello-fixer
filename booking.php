<?php
	require ('connection/connection.php');
	include('header.php');
	if(isset($_SESSION['id']))
	{}
	else header("location:customerlogin.php");
	$work=$_GET['var'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="css/booking.css">
</head>
<body>
<center>
<h1> <?php echo "$work";?></h1>
<div id="d1">
	<table style="width:800px;">
		<tr>
			<th>Worker Id</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Phone</th>
			<th>Price</th>
		</tr>
		<?php 	
			$que="select * from worker where work='".$work."' and city='".$_SESSION['city']."'";
			$a=mysqli_query($con,$que);
           	while ($row = mysqli_fetch_array($a)) {
				?>
				<tr>
					<td><?php echo $row['wid']; ?></td>
					<td><?php echo $row['wname']; ?></td>
					<td><?php echo $row['gender']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><a  href="bookingdone.php ? wnme=<?php echo $row['wname'];?> & wid=<?php echo $row['wid'];?> & wphone=<?php echo $row['phone'];?> & wk=<?php echo $work; ?> "  class="book" onclick="confirm();">Book</a></td>
				</tr>
				<?php 
			}	 ?>
	</table>
</div>
</center>
</body>
</html>

<script>
	function confirm()
	{
		alert('Booking Confirm');
	}
</script>