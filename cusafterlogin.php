<?php
	require ('connection/connection.php');
	include('header.php');
	if(isset($_SESSION['id']))
	{}
	else header("location:customerlogin.php");
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" href="css/cusafterlogin.css">
</head>
<body>
<center>
	<form action="">
		<div class="form">
			<table style="margin-top: 60px;" cellspacing=40>
				<tr>
					<td align=center class="workers">
						<a href="booking.php ? var=Carpenter" class="links"><img src="Images/carpenter.png" height="100" width="100"><br><label class="label">Carpenter</label></a></td>
					</td>
					<td align=center class="workers">
						<a href="booking.php ? var=Electrician" class="links"><img src="Images/electrician.png" height="100" width="100"><br><label class="label">Electrician</a>
					</td>
					<td align=center class="workers">
						<a href="booking.php ? var=Labour" class="links"><img src="Images/labour.png" height="100" width="100"><br><label class="label">Labour</a>
					</td>
					<td align=center class="workers">
						<a href="booking.php ? var=Maid" class="links"><img src="Images/maid.png" height="100" width="100"><br><label class="label">Maid</a>
					</td>
				</tr>	
				<tr>
					<td align=center class="workers">
						<a href="booking.php ? var=Mechanic" class="links"><img src="Images/mechanic.png" height="100" width="100"><br><label class="label">Mechanic</a>
					</td>
					<td align=center class="workers">
						<a href="booking.php ? var=Packers/Movers" class="links"><img src="Images/packer.png" height="100" width="100"><br><label class="label">Packers/Movers</a>
					</td>
					<td align=center class="workers">
						<a href="booking.php ? var=Painter" class="links"><img src="Images/painter.png" height="100" width="100"><br><label class="label">Painter</a>
					</td>
					<td align=center class="workers">
						<a href="booking.php ? var=Plumber" class="links" ><img src="Images/plumber.png" height="100" width="100"><br><label class="label">Plumber</label></a>
					</td>
				</tr>
			</table>
		</div>
	</form>
</center>
</body>
</html>