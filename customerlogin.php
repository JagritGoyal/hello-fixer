<?php
	require ('connection/connection.php');
	if(isset($_SESSION['id']))
	{
		header('location:cusafterlogin.php');
	}
	if (isset($_POST['login'])) 
	{
		$id=$_POST['usr'];
		$pass=md5($_POST['pass']);
		$que="select * from customer where email='".$id."'";
		$var=mysqli_query($con,$que);
		if(mysqli_num_rows($var))
		{
			$fetch=mysqli_fetch_array($var);
			if ($pass==$fetch['password'])
			{	
				$_SESSION['uname']=$fetch['cname'];
				$_SESSION['phone']=$fetch['phone'];
				$_SESSION['id']=$fetch['cid'];
				$_SESSION['address']=$fetch['address'];
				$_SESSION['city']=$fetch['city'];
				$_SESSION['pass']=$fetch['password'];
				$_SESSION['utype']='customer';
				header("location:cusafterlogin.php");
			}
			else echo "<script>alert('Wrong Password')</script>";
		}
		else echo"<script>alert('Email invalid')</script> ";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customer Login</title>
	<link rel="stylesheet" href="css/customerlogin.css">
</head>
<body >
<a href="welcome.php" class="back"><img src="Images/back-button.png" class="back_icon"><label class="back_text">Back</label></a>

<form method="post">
<div class="form">
	<table width=450px>
		<tr>
			<td width=200px><label class="field">Username:</label></td>
			<td><input type="text" name="usr" id="usr" required placeholder="Username" class="input"></td>
		</tr>
		<tr>
			<td><label class="field">Password: </label></td>
			<td><input type="password" name="pass" id="pass" required placeholder="Password" class="input"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="checkbox" name="shw" id="shw" onchange="showpass();" class="check">
			<label class="show_pass">Show Password</label></td>
		</tr>
		<tr>	
			<td colspan=2 align=center><input type="submit" name="login" id="login" value="Login" onclick="chk();" class="button"></td>
		</tr>
		<tr>
			<td colspan=2 align=center><label style="font-size:20px"><a href="customerregister.php">New User? Register here</a></label></td>
		</tr>
	</table>
</div>
</form>
</body>
</html>
<script type="text/javascript">
	function showpass()
	{
		if (document.getElementById('shw').checked) 
		{
			document.getElementById('pass').type='text';				
		}
		else
			document.getElementById('pass').type='password';				 
	}
	function chk() 
	{	
		if (document.getElementById('usr').value=="")
		{
			alert("Enter Username");
		}
		else if (document.getElementById('pass').value=="")
		{
			alert("Enter password");
		} 
	}
</script>