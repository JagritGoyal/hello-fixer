<?php
    require('connection/connection.php');
    $msg="";
    if(isset($_POST["register"]))
    {
        $email = $_POST["email"];
        $query="select email from customer where email='". $email ."'";
        $sql=mysqli_query($con,$query);
        $count=mysqli_num_rows($sql);
        if($count)
        {
            $msg .= "Email Already Registered";
        }
        else
        {
            $cid = $_POST["id"];
            $name = $_POST["name"];
            $gender = $_POST["gender"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $phone = $_POST["phone"];
            $pass = md5($_POST["pass"]);
            $conpass=md5($_POST["conpass"]);
            $image = $_FILES['pic']['name'];
            $target = "pics/".basename($image);
            
            if ($pass!=$conpass) 
            {
                echo "<script>alert('Passwords does not match');</script>";
            }
            else
            {    
                move_uploaded_file($_FILES['pic']['tmp_name'], $target);
                $query = "insert into customer values ('".$cid."','".$name."','".$gender."','".$phone."','".$state."','".$city."','".$address."','".$email."','".$pass."','".$image."')";
                if (!mysqli_query($con, $query))
                    echo mysqli_error($con);
                else
                {   
                    echo "<script>if(window.confirm('Account Created!!')){window.location='customerlogin.php';}</script>";
                }
            }        
        }   
    }
?>


<html>
<head>
    <link rel="stylesheet" href="css/customerregister.css">
    <script>
        <?php
            $cid="10000";
            $sql="select cid from customer order by cid desc";
            $query=mysqli_query($con,$sql);
            $count=mysqli_num_rows($query);
            if($count)
            {
                $row=mysqli_fetch_array($query);
                $cid=$row["cid"];
            }
            $cid=$cid+1;
        ?>
        window.onload=function(){ document.getElementById("cid").value="<?php echo $cid ?>";};
        function chckpass()
        {
            $pass=document.getElementById("pass").value;
            $conpass=document.getElementById("conpass").value;
            if( $pass == $conpass)
                document.getElementById("divpass").innerHTML="Passwords Matched";
            else
                document.getElementById("divpass").innerHTML="Passwords Not Matched";
        }
    </script>
</head>
<body>
<a href="welcome.php" class="back"><img src="Images/back-button.png" class="back_icon"><label class="back_text">Back</label></a>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form">
            <table  style="font-size: 20px;">
                <tr>
                    <td><label class="label">Customer id: </label></td>
                    <td><input type="text" name="id" id= "cid" class="input" readonly></td>

                    <td><label class="label">Name: </label></td>
                    <td><input type="text" name="name" class="input" required></td>
                </tr>
                <tr>
                    <td><label class="label">Gender: </label></td>
                    <td><input type="radio" id="r1" name="gender" class="input" value="male" required>Male
                    <input type="radio" id="r2" name="gender" class="input"  value="female" required>Female</td>

                    <td><label class="label">Phone: </label></td>
                    <td><input type="number" name="phone" class="input" id="p1" onchange="validate();"required><br>
                    <div id="divphn"></div></td>
                </tr>
                <tr>
                    <td><label class="label">State: </label></td>
                    <td><input type="text" name="state" class="input" required></td>

                    <td><label class="label">City: </label></td>
                    <td><input type="text" name="city" class="input" required></td>
                </tr>
                <tr>
                    <td><label class="label">Address: </label></td>
                    <td><input type="text" name="address" class="input" required></td>
                    
                    <td><label class="label">Email: </label></td>
                    <td><input type="email" name="email" class="input" required></td>
                </tr>
                <tr>             
                    <td><label class="label"> Password: </label></td>
                    <td><input type="password" name="pass" id="pass" class="input" onchange="chckpass();" required></td>                    
                    <td align=right colspan=2><div id="validate">
                        <?php echo $msg ?>
                    </div></td>
                </tr>
                <tr>
                    <td><label class="label"> Confirm Password: </label></td>
                    <td><input type="password" name="conpass" id="conpass" class="input" onchange="chckpass();" required><br>
                    <div id="divpass"></div></td>
                    <td><label class="label">Picture: </label></td>
                    <td><input type="file" name="pic" id="pic1" class="label" required></td>
                </tr>
                <tr>
                    <td colspan=2 align=center><input type="submit" value="Register" name="register" class="button"></td>
                    <td colspan=2 rowspan=2 align=center valign=top><img src=""  id="imga" style=" height: 100px; width: 100px;"><br></td>
                </tr>
                <tr>
                    <td colspan=2 align=center><a href="customerlogin.php">Already Registered? Login</a></td>
                </tr>
                </div>
            </table>
    </form>
</body>
<script>
    document.getElementById('pic1').onchange = function showimg()
    {
        var reader = new FileReader();
        reader.onload = function ()
        {
            document.getElementById('imga').src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    function validate()
    {   
        var num=document.getElementById('p1').value.length;
        if(num < 10 || num > 10)
        {
            document.getElementById('divphn').innerHTML='Invalid Number';
        }
        else document.getElementById('divphn').innerHTML='';
    }
</script>
</html>