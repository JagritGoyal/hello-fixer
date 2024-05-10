<?php
	require ('connection/connection.php');
	include('header.php');
	if(! isset($_SESSION['id']))
		header("location:customerlogin.php");
	
	$qury="select * from customer where cid='".$_SESSION['id']."'";
	$a=mysqli_query($con,$qury);
	if (!$a) 
	{	
		echo "error";
	}
	$fetch=mysqli_fetch_array($a);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="css/customerprofile.css">
</head>
<body text="" bgcolor="#f1e8d7">
<center>
	<div id="div_display" class="display">
	<h1>Profile</h1>
	<img src="pics/<?php echo $fetch['location'];?> " class="img"><br>	<br>
		<table style="font-size:23px;">
			<tr>
				<td style="width:250px"><label class="label"><b>Customer Id:</b> </label></td>
				<td><label class=""> <?php echo $fetch['cid'];?></label></td>
			</tr>
			<tr>
				<td><label class="label"><b>Name:</b> </label></td>
				<td><?php echo $fetch['cname'];?></td>
			</tr>
			<tr>
				<td><label class="label"><b>Gender:</b> </label></td>
				<td><?php echo $fetch['gender'];?></td>
			</tr>
			<tr>
				<td><label class="label"><b>Phone:</b> </label></td>
				<td><?php echo $fetch['phone'];?></td>	
			</tr>
			<tr>
				<td><label class="label"><b>State:</b> </label></td>
				<td><?php echo $fetch['state'];?></td>	
			</tr>
			<tr>
				<td><label class="label"><b>City:</b> </label></td>
				<td><?php echo $fetch['city'];?></td>
			</tr>
			<tr>
				<td><label class="label"><b>Address:</b> </label></td>
				<td><?php echo $fetch['address'];?></td>	
			</tr>
			<tr>	
				<td><label class="label" ><b>E-mail:</b> </label></td>
				<td><?php echo $fetch['email'];?></td>	
			</tr>
			<tr>
				<td align=center colspan=3><input type="button" name="edit"  id="b1" value="Edit" onclick="shw();" class="pro_button">
				<input type="button" name="change" id="b3" value="Change Password" onclick="shw4();" class="pro_button">
				<input type="button" name="delete" id="b2" value="Delete" onclick="shw3();" class="pro_button"></td>
			</tr>
		</table>
	</div>
</center>
<center>
	<form method="post">
		<div id="div_update" class="display" style="display: none;">
		<h1>Update Profile</h1>
			<table width=500 style="margin-left:100px; font-size:23px;">
				<tr>
					<td><label class="label"> Name: </label></td>
					<td><input type="text" name="name" id="name" value="<?php echo $fetch['cname']?>" class="input"></td>
				</tr>
				<tr>
					<td><label class="label"> Gender: </label></td>
					<td><input type="radio" name="gender" id="male" value="male" class="input" style="height: 20px; width: 20px;">Male
					<input type="radio" name="gender" id="female" style="height: 20px; width: 20px;" value="female" class="input">Female<br>
						<?php
							if($fetch['gender']=='male') 
								echo'<script>document.getElementById("male").checked=true;</script>';
							else 
								echo'<script>document.getElementById("female").checked=true;</script>';
						?>
					</td>
				</tr>		
				<tr>	
					<td><label class="label"> Phone: </label></td>
					<td><input type="number" name="phone" id="phone"  onchange="validate();" value="<?php echo $fetch['phone'] ?>" class="input">
					<div id="divphn">
					</div>
					</td>
				</tr>
				<tr>		
					<td><label class="label">State:</label></td>
					<td><input type="text" name="state" id="state" value="<?php echo $fetch['state'] ?>" class="input"></td>
				</tr>
				<tr>
					<td><label class="label">City:</label></td>
					<td><input type="text" name="city" id="city" value="<?php echo $fetch['city']?>" class="input"></td>
				</tr>
				<tr>
					<td><label class="label">Address:</label></td>
					<td><input type="text" name="address" id="address"value="<?php echo $fetch['address']?>" class="input"></td>
				</tr>
				<tr>
					<td><label class="label">Email:</label></td>
					<td><input type="email" name="email" id="email"value="<?php echo $fetch['email']?>" class="input"></td>
				</tr>
				<tr>
					<td colspan=2 align=center><input type="submit" name="update" value="Update" class="pro_button">
					<input type="button" name="cancel" value="Cancel" onclick="shw2();" class="pro_button"></td>
				</tr>
			</table>
		</div>
	</form>
</center>
<center>
	<form method="post">
		<div id='div_pass' style="display:none;">
		<h1>Change Password</h1>
		<table width=600 style="font-size:21px;">
			<tr>
				<td><label class="label">New Password: </label></td>
				<td><input type='password' id='chngpass' name='chngpass'  class="input" required></td>
			</tr>
			<tr>
				<td><label class="label">Confirm New Password: </label></td>
				<td><input type='password' id='chngconpass' required name='chngconpass' onchange="chckpass();" class="input" required></td>
			</tr>
			<tr>
				<td colspan=2 align=center><input type='submit' name='chng_pass' id="chng_pass" value="Change Password" class="pro_button">
				<input type="button" name="cancel" value="Cancel" onclick="shw2();" class="pro_button"></td>
			</tr>
		</table>
		</div>
	</form>
</center>
<center>
	<form method="post">
		<div id="div_delete" style="display:none;">
			<h1>Delete Account</h1>
			<table  width=650 style=" font-size:21px;">
				<tr>
					<td><label class="label">Enter password to delete account: </label></td>
					<td><input type="password" name="pass" id="pass" class="input"></td>
				</tr>
				<tr>
					<td colspan=2 align=center><input type="submit" name="delete_acc" value="Delete" class="pro_button">
					<input type="button" name="cancel" value="Cancel" onclick="shw2();" class="pro_button"></td>
				</tr>
			</table>
		</div>
	</form>
</center>
	
</body>
</html>
<script type="text/javascript">
	function shw()
	{
		document.getElementById('div_display').style.display='none';
		document.getElementById('div_update').style.display='block';
		document.getElementById('div_pass').style.display='none';
		document.getElementById('div_delete').style.display='none';
	}
	function shw2()
	{
		document.getElementById('div_display').style.display='block';
		document.getElementById('div_update').style.display='none';
		document.getElementById('div_pass').style.display='none';
		document.getElementById('div_delete').style.display='none';
	}
	function shw3()
	{	
		document.getElementById('div_delete').style.display='block';
		document.getElementById('div_display').style.display='none';
		document.getElementById('div_update').style.display='none';
		document.getElementById('div_pass').style.display='none';		
	}
	function shw4()
	{
		document.getElementById('div_display').style.display='none';
		document.getElementById('div_update').style.display='none';
		document.getElementById('div_pass').style.display='block';
		document.getElementById('div_delete').style.display='none';
	}

	function chckpass()
	{
		var pass=document.getElementById("chngpass").value;
        var conpass=document.getElementById("chngconpass").value;
        if(! (pass == conpass))
			alert('Password not matched');
	}

    function validate()
    {   
        var num=document.getElementById('phone').value.length;
        if(num < 10 || num > 10)
        {
            document.getElementById('divphn').innerHTML='Invalid Number';
        }
        else document.getElementById('divphn').innerHTML='';
    }
</script>
<?php
	if(isset($_POST['delete_acc']))
	{
		$pas=md5($_POST['pass']);
		$que="select password from customer where cid='".$_SESSION['id']."'";
		$var=mysqli_query($con,$que);
		if(mysqli_num_rows($var))
		{	
			$fetch=mysqli_fetch_array($var);
			if ($pas==$fetch['password'])	
			{
				$sql="delete from customer where cid='".$_SESSION['id']."'";
				if(mysqli_query($con,$sql))
				{	
					{	
						unset($_SESSION['id']);
						session_destroy();
						echo "<script>
								alert('Account Deleted');
								window.location='customerlogin.php'; 
							</script>";
					}
				}
			}
			else
			{
				echo "<script> alert('Wrong Password');</script>";
			}
		}
	}
	if(isset($_POST['update']))
	{	
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$phone=$_POST['phone'];
		$state=$_POST['state'];
		$city=$_POST['city'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		
		$sql="update customer set cname='".$name."',gender='".$gender."',phone='".$phone."',state='".$state."',city='".$city."',address='".$address."',email='".$email."' where cid='".$_SESSION['id']."'";
		if(mysqli_query($con,$sql))
		{
			echo "<script>
					alert('Profile Updated Successfully');
					window.location='customerprofile.php';
				</script>";
		}
		else 
			echo mysqli_error($con);
	}
	if(isset($_POST['chng_pass']))
	{
		$chngpass = md5($_POST['chngpass']);
		$query = "update customer set password= '" .$chngpass. "' where cid='".$_SESSION['id']."'";
		if(mysqli_query($con,$query))
			echo "<script>alert('Password Updated');</script>";
		else 
			echo mysqli_error($con);	
	}
?>