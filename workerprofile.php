<?php
	require ('connection/connection.php');
	include('header.php');
	if(! isset($_SESSION['uname']))
		header("location:workerlogin.php");

	$qury="select * from worker where wid='".$_SESSION['id']."'";
	$a=mysqli_query($con,$qury);
	if (!$a) 
		echo "error";
	$fetch=mysqli_fetch_array($a);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="css/workerprofile.css">
</head>
<body bgcolor="#f1e8d7">
<center>
	<div id="div_display" class="display">
		<h1>Profile</h1>
		<img src="pics/<?php echo $fetch['location']?>" class="img"><br><br>
		<table style="font-size:23px;">
			<tr>
				<td style="width:250px"><label class="label" style="color:black;"><b>Worker Id:</b></label></td>
				<td><label class=""> <?php echo $fetch['wid'];?></label></td>
			</tr>
			<tr>
				<td><label class="label" style="color: black;"><b>Name: </b></label></td>
				<td><label class=""><?php echo $fetch['wname'];?></label></td>
			</tr>
			<tr>
				<td><label class="label" style=" color: black;"><b>Gender: </b> </label></td>
				<td><label class=""><?php echo $fetch['gender'];?></label></td>
				</tr>
			<tr>
				<td><label class="label" style=" color: black;"><b>Phone:</b> </label></td>
				<td><label class=""><?php echo $fetch['phone'];?></label></td>
			</tr>
			<tr>
				<td><label class="label" style=" color: black;"><b>State: </b> </label></td>
				<td><label class=""><?php echo $fetch['state'];?></label></td>
			</tr>
			<tr>
				<td><label class="label" style=" color: black;"><b>City: </b> </label></td>
				<td><label class=""><?php echo $fetch['city'];?></label></td>
			</tr>
			<tr>
				<td><label class="label" style=" color: black;"><b>Address:</b> </label></td>
				<td><label class=""><?php echo $fetch['address'];?></label></td>
			</tr>
			<tr>
				<td><label class="label" style=" color: black;"><b>E-mail: </b> </label></td>
				<td><label class=""><?php echo $fetch['email'];?></label></td>
			</tr>
			<tr>	
				<td><label class="label" style=" color: black;"><b>Work: </b> </label></td>
				<td><label class=""><?php echo $fetch['work']; ?></label></td>
			</tr>
			<tr>
				<td><label class="label" style=" color: black;"><b>Price: </b> </label></td>
				<td><label class=""><?php echo $fetch['price']; ?></label></td>
			</tr>
			<tr>
				<td align=center colspan=3><input type="button" name="edit" value="Edit" id="b1" onclick="shw();" class="pro_button">
				<input type="button" name="change" id="b3" value="Change Password" onclick="shw4();" class="pro_button">
				<input type="button" name="delete" value="Delete" id="b2" onclick="shw3();" class="pro_button"></td>
			</tr>
		</table>
	</div>
</center>
<center>
	<form method="post">
		<div id="div_update" style="display: none;">
			<h1>Update Profile</h1>
			<table  width=500 style=" font-size:23px;">
				<tr>
					<td><label class="label"> Name:</label></td>
					<td><input type="text" name="name" id="name" value="<?php echo $fetch['wname']; ?>" class="input"></td>
				</tr>
				<tr>
					<td><label class="label">Gender:</label></td>
					<td><input type="radio" name="gender" id="male" value="male" style="height: 20px; width: 20px;"class="input">Male
					<input type="radio"style="height: 20px; width: 20px;" name="gender" id="female" value="female" class="input">Female</td>
						<?php 
							if($fetch['gender']=='male') 
								echo'<script>document.getElementById("male").checked=true;</script>';
							else 
								echo'<script>document.getElementById("female").checked=true;</script>';
						?>
				</tr>
				<tr>
							
					<td><label class="label">Phone:</label></td>
					<td><input type="number" name="phone" id="phone" value="<?php echo $fetch['phone'];?>" onchange="validate();" class="input"></td>
						<div id="divphn"></div>
				</tr>
				<tr>		
					<td><label class="label">State:</label></td>
					<td><input type="text" name="state" id="state" value="<?php echo $fetch['state']; ?>" class="input"></td>
				</tr>
				<tr>
					<td><label class="label">City:</label></td>
					<td><input type="text" name="city" id="city" value="<?php echo $fetch['city']; ?>" class="input"></td>
				</tr>
				<tr>
					<td><label class="label">Address:</label></td>
					<td><input type="text" name="address" id="address" value="<?php echo $fetch['address']; ?>" class="input"></td>
				</tr>
				<tr>
					<td><label class="label">Email:</label></td>
					<td><input type="email" name="email" id="email"  value="<?php echo $fetch['email']; ?>" class="input"></td>			
				</tr>
				<tr>
					<td><label class="label">Work:</label></td>
						<?php
							$work=array("Carpenter","Electrician","House Keeper","Labour","Packers/Movers","Plumber","Mechanic");
							$wrk = $fetch['work'];
							echo "<td><select id='work' name='work' class='select' style='width:198px'>";
								foreach($work as $i)
								{
									echo $i;
									if($wrk == $i)
									{
										echo "<option value=".$i." selected>".$i."</option>";
									}
									else
									{
										echo "<option value=".$i.">".$i."</option>";
									}
								}	
							echo "</select></td>";
						?>
				</tr>
				<tr>
					<td><label class="label">Price:</label></td>
					<td><input type="number" name="price" id="price" value="<?php echo $fetch['price']; ?>" class="input"></td>				
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
				<td><label class="label">Confirm New Password: </label></td><td><input type='password' id='chngconpass' name='chngconpass' onchange="chckpass();"  class="input" required></td>
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
		<div id="div_delete" style="display: none;">
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
		document.getElementById('div_update').style.display='block';
		document.getElementById('div_display').style.display='none';
		document.getElementById('div_pass').style.display='none';
		document.getElementById('div_delete').style.display='none';
	}
	function shw2()
	{
		document.getElementById('div_update').style.display='none';
		document.getElementById('div_display').style.display='block';
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
	function validate()
    {
        var num=document.getElementById('phone').value.length;
        if(num < 10 || num > 10)
        {
            document.getElementById('divphn').innerHTML='Invalid Number';
        }
        else document.getElementById('divphn').innerHTML='';
    }
	function chckpass()
	{
		var pass=document.getElementById("chngpass").value;
        var conpass=document.getElementById("chngconpass").value;
        if(! (pass == conpass))
			alert('Password not matched');
	}
</script>
<?php
	if(isset($_POST['delete_acc']))
	{	
		$pas=md5($_POST['pass']);
		$query="select password from worker where wid='".$_SESSION['id']."'";
		$var=mysqli_query($con,$query);
		if(mysqli_num_rows($var))
		{
			$fetch=mysqli_fetch_array($var);
			if($pas==$fetch['password'])
			{
				$sql="delete from worker where wid='".$_SESSION['id']."'";
				if(mysqli_query($con,$sql))
				{	
					unset($_SESSION['id']);
					session_destroy();
					echo "<script>
					alert('Account Deleted');
					window.location='workerlogin.php'; 
					</script>";
				}
				else echo mysqli_error($con);
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
		$work=$_POST['work'];
		$price=$_POST['price'];

		$sql="update worker set wname='".$name."',gender='".$gender."',phone='".$phone."',state='".$state."',city='".$city."',address='".$address."',email='".$email."',work='".$work."',price='".$price."' where wid='".$_SESSION['id']."'";
		if(mysqli_query($con,$sql))
		{
			echo "<script>
					alert('Profile Updated Successfully');
					window.location='workerprofile.php';
				</script>";
		}
		else 
			echo mysqli_error($con);	
	}
	if(isset($_POST['chng_pass']))
	{
		$chngpass = md5($_POST['chngpass']); 
		$query = "update worker set password= '" .$chngpass. "' where wid='".$_SESSION['id']."'";
		if(mysqli_query($con,$query))
			echo "<script>alert('Password Updated');</script>";
		else 
			echo mysqli_error($con);	
	}
?>