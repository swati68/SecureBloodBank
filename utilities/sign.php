<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <div style="margin:auto;width:1200px;">
    <div>
    <marquee><h3><font color="red">This is a demo website created by the students of Vellore Institute of Technology,Chennai. But please donate plasma if you are a COVID-19 survivor. Your small Contribution can save somone's life.</font></h3></marquee>
    </div>
    <header>
        <div style="height:180px;">
            <img src='government-of-india.jpg' id='logo' height='180' width='360' align='left'/>
            <br><br>
            <h1 align="center"><font color="blue">Government of India Blood and Plasma Bank for COVID-19 Pandemic</font></h1>
        </div>
    </header>
    <div style="background-color:blue;">
        <h2 align="center"><font color="white"><b>Registration Form</b></font></h2>
    </div>

    <div>
        <?php
        if(isset($_POST['submit'])){
        
        include 'db_connection.php';
        $con = OpenCon();
        //$con= mysqli_connect('localhost','root','');
        //mysqli_select_db($con, 'user_reg');
        $name=htmlspecialchars($_POST['name']);
        $dob=htmlspecialchars($_POST['dob']);
        $gen=htmlspecialchars($_POST['gen']);
        $mar=htmlspecialchars($_POST['marital']);
        $occu=htmlspecialchars($_POST['occu']);
        $sal=htmlspecialchars($_POST['sal']);
        $hno=htmlspecialchars($_POST['hno']);
        $sno=htmlspecialchars($_POST['sno']);
        $city=htmlspecialchars($_POST['city']);
        $state=htmlspecialchars($_POST['state']);
        $coun=htmlspecialchars($_POST['country']);
        $pin=htmlspecialchars($_POST['pin']);
        $phno=htmlspecialchars($_POST['phno']);
        $email=htmlspecialchars($_POST['email']);
        $uname= htmlspecialchars($_POST['uname']);
        $pass= htmlspecialchars($_POST['pass']);
        $rpass=htmlspecialchars($_POST['pass1']);

        if($pass != $rpass){
            echo 'Please re-enter the same password';
        }
        else{
            $s = "SELECT * FROM user_table WHERE Username = '$uname'";

            $result =mysqli_fetch_array( mysqli_query($con,$s), MYSQLI_ASSOC);

            $unames = $result["Username"];

            if($unames==""){
                $options = [ 
                    'cost' => 10, 
                    'salt' => '$P27r06o9!nasda57b2M22'
            ]; 
            $pass = password_hash($pass, PASSWORD_BCRYPT, $options);
                $e = "INSERT INTO user_table (Name,DOB,Gender,MaritalStatus,Occupation,Salary,HouseNo,StreetNo,City,State,Country,PIN,PhoneNo,EmailID,Username,Passcode) VALUES ('$name','$dob','$gen','$mar','$occu','$sal','$hno','$sno','$city','$state','$coun','$pin','$phno','$email','$uname','$pass')";

                $res = mysqli_query($con,$e);
                $e1="INSERT INTO users(username,passcode) VALUES('$uname','$pass')";
                $res1=mysqli_query($con,$e1);
                if($res){
                //Preventing cross site scripting
                $xss_free_uname = $uname;
                echo "Account $xss_free_uname Successfully Created";}
                else{
                echo mysqli_error($con);
            }
            }
            else{
                echo 'The entered Username already exists. Try another one!';
            }

        }
    
    CloseCon($con);}
        ?>

    </div>
    <form align="center" method="POST" action="sign.php">
        <!--Preventing html attacks-->
    <?php $oldguess = isset($_POST['name']) ? htmlentities($_POST['name']) : '';?>
    <p><label><b>Name: </b></label>&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="name" placeholder="Enter your full name" value="<?php echo($oldguess);?>"required></p>
    <p><label><b>Date of Birth: </b></label>&nbsp;&nbsp;&nbsp;&nbsp; <input type="date" name="dob" required></p>
    <p><label><b>Gender: </b></label>&nbsp;&nbsp;&nbsp;&nbsp; 
        <select name="gen">
            <option>--Select--</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>
    </p>
    <p>
        <label><b>Marital Status:</b></label>
        &nbsp;&nbsp;&nbsp;&nbsp; 
        <select name="marital">
            <option>--Select--</option>
            <option>Single</option>
            <option>Married</option>
            <option>Divorced</option>
            <option>Widow</option>
        </select>
    </p>
    <p>
        <label><b>Occupation:</b></label>
        &nbsp;&nbsp;&nbsp;&nbsp; 
        <input type="text" name="occu" placeholder="Enter Occupation" required>
    </p>
    <p>
        <label><b>Salary</b></label>
        &nbsp;&nbsp;&nbsp;&nbsp; 
        <select name="sal">
            <option>--Select--</option>
            <option>Between 0-1 Lac</option>
            <option>Between 1-2 Lac</option>
            <option>Between 2-3 Lac</option>
            <option>Between 3-4 Lac</option>
            <option>Between 4-5 Lac</option>
            <option>More than 5 Lac</option>
        </select>
    </p>
    <p><label><b>Address:</b></label></p>
    <p>
        <input type="text" name="hno" placeholder="House No." required> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="sno" placeholder="Street Name" required>
    </p>
    <p>
        <input type="text" name="city" placeholder="City" required>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="state" placeholder="State" required>
    </p>
    <p>
        <input type="text" name="country" placeholder="Country" required>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="pin" placeholder="Pin Code" required>
    </p>
    <p>
        <label><b>Phone Number:</b></label>
        &nbsp;&nbsp;&nbsp;&nbsp; 
        <input type="text" name="phno" placeholder="Enter Phone Number" required>
    </p>
    <p>
        <label><b>Email-Id:</b></label>
        &nbsp;&nbsp;&nbsp;&nbsp; 
        <input type="email" name="email" placeholder="Enter E-Mail Id" required> 
    </p>
    <p>
        <label><b>Username:</b></label>
        &nbsp;&nbsp;&nbsp;&nbsp; 
        <input type="text" name="uname" placeholder="Enter a unique Username" required> 
    </p>
    <p>
        <label><b>Password:</b></label>
        &nbsp;&nbsp;&nbsp;&nbsp; 
        <input type="password" name="pass" placeholder="Enter Password" required>
    </p>
    <p>
        <label><b>Re-Enter Password:</b></label>
        &nbsp;&nbsp;&nbsp;&nbsp; 
        <input type="password" name="pass1" placeholder="Re-Enter Password" required>
    </p>
    <input type="submit" value="Register" name="submit" style="font-size:20px; padding:3px 22px; ">
    </form>
    </div>
    <div align="center">
        <br>
        <a href="index.html"><button style="font-size:20px; padding:3px 22px;">Home</a>
        
        <a href="log.php"><button style="font-size:20px; padding:3px 22px;">Login</a>
    </div>
</body>
</html>