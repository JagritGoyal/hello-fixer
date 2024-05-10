<?php
    require('connection/connection.php');
    $msg="";
    if(isset($_POST["register"]))
    {
        $email = $_POST["email"];
        $query="select email from worker where email='". $email ."'";
        $sql=mysqli_query($con,$query);
        $count=mysqli_num_rows($sql);
        if($count)
        {
            $msg .= "Email Already Registered";
        }
        else
        {
            $wid = $_POST["id"];
            $name = $_POST["name"];
            $gender = $_POST["gender"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $phone = $_POST["phone"];
            $pass = md5($_POST["pass"]);
            $conpass=md5($_POST["conpass"]);
            $work=$_POST['work'];
            $price=$_POST['price'];
            $image = $_FILES['pic']['name'];
            $target = "pics/".basename($image);
            if ($pass!=$conpass) 
            {
                echo "<script>alert('Passwords does not match');</script>";
            }
            else
            {
                move_uploaded_file($_FILES['pic']['tmp_name'], $target);
                $query = "insert into worker values ('".$wid."','".$name."','".$gender."','".$phone."','".$state."','".$city."','".$address."','".$email."','".$pass."','".$image."','".$work."','".$price."')";
                if (!mysqli_query($con, $query))
                    echo mysqli_error($con);
                else
                {   
                    echo "<script>if(window.confirm('Account Created!!')){window.location='workerlogin.php';}</script>";
                }
            }
        }
    }
?>

<html>
<head>
    <link rel="stylesheet" href="css/workerregister.css">
    <script>
        <?php
            $wid="20000";
            $sql="select wid from worker order by wid desc";
            $query=mysqli_query($con,$sql);
            $count=mysqli_num_rows($query);
            if($count)
            {
                $row=mysqli_fetch_array($query);
                $wid=$row["wid"];
            }    
            $wid=$wid+1;
        ?>
        window.onload=function(){ document.getElementById("wid").value="<?php echo $wid ?>";};
        
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
            <table  style="font-size:20px; margin-top: 10px;">
                <tr>
                    <td><label class="label"> Worker id: </label></td>
                    <td><input type="text" name="id" id= "wid" class="input" readonly></td>

                    <td><label class="label"> Name: </label></td>
                    <td><input type="text" name="name" class="input" required></td>
                </tr>
                <tr>
                    <td><label class="label"> Gender: </label></td>
                    <td><input type="radio" id="r1" name="gender" class="male input" value="male" required>Male
                    <input type="radio" id="r2" name="gender" class="input"  value="female" required>Female</td>
                    
                    <td><label class="label"> Phone: </label></td>
                    <td><input type="number" name="phone" class="input" id="p1" onchange="validate();" required><br>
                    <div id="divphn"></div></td>
                </tr>
                <tr>
                    <td><label class="label"> State: </label></td>
                    <td><input type="text" name="state" class="input" required></td>

                    <td><label class="label"> City: </label></td>
                    <td><input type="text" name="city" class="input" required></td>
                </tr>
                <tr>
                    <td><label class="label">Address: </label></td>
                    <td><input type="text" name="address" class="address input" required></td>
                
                    <td><label class="label"> Email: </label></td>
                    <td><input type="text" name="email" class="email input" required></td>
                </tr>
                <tr>
                    <td><label class="label"> Password: </label></td>
                    <td><input type="password" name="pass" id="pass" class="pass input" onchange="chckpass();" required></td>
                    <td align=right colspan=2>
                    <div id="validate">
                        <?php echo $msg ?>
                    </div></td>
                </tr>
                <tr>
                    <td><label class="label"> Confirm Password: </label></td>
                    <td><input type="password" name="conpass" id="conpass" class="pass input" onchange="chckpass();" required><br>
                    
                    </td>
                    <td colspan="2"><div id="divpass"></div></td>                            
                </tr>
                <tr>
                    <td><label class="label"> Work:</label></td>
                    <td><select id="work" name="work" onclick="show();" class="select">
                        <option value="hidden" selected hidden></option>
                        <option value="Carpenter">Carpenter</option>
                        <option value="Electrician">Electrician</option>
                        <option value="Labour">Labour</option>
                        <option value="Maid">Maid</option>
                        <option value="Mechanic">Mechanic</option>
                        <option value="Packers/Movers">Packers/Movers</option>
                        <option value="Painter">Painter</option>
                        <option value="Plumber">Plumber</option>
                        </select>
                    </td>
                    <td><label class="label"> Picture: </label></td>
                    <td><input type="file" name="pic" id="pic1" required></td>
                </tr>
                <tr>
                    <td><label class="Price"> Price:</label></td>
                    <td><input type="number" name="price" id="price" class="input" required>(Rs.)</td>
                    <td colspan=2 rowspan=3 align=center>
                    <img src=""  id="imga" style="height: 100px; width: 100px;"><br>
                    </td>
                </tr>
                <tr>
                    <td colspan=2 align=center><input type="submit" value="Register" name="register" class="button"></td>
                </tr>
                <tr>
                    <td colspan=2 align=center><a href="workerlogin.php">Already Registered? Login</a></td>
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