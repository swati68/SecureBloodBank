<?php
include 'db_connection.php';
$con = OpenCon();
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $error="Invalid Username or Password";
    $user=test_input(mysqli_real_escape_string($con,$_POST['u']));
	$pass=test_input(mysqli_real_escape_string($con,$_POST['p']));
    $options = [ 
            'cost' => 10, 
            'salt' => '$P27r06o9!nasda57b2M22'
    ]; 
    $pass = password_hash($pass, PASSWORD_BCRYPT, $options);
    $sql = $con->prepare("SELECT * FROM users WHERE username = ? and passcode = ?");
    $sql->bind_param("ss",$user,$pass);
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $count=$result->num_rows;
    if($count == 1) {
        $timezone_identifier="Asia/Karachi";
        date_default_timezone_set($timezone_identifier);
        $_SESSION['login_user'] = $user;
        $currtime = time();
        $tstamp = date('Y-m-d H:i:s',$currtime);
        $_SESSION['time'] = $currtime;  
        
        $sql1 = "INSERT INTO logger(User,LoginTime) VALUES ('$user','$tstamp')";
        $result1 = mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
        
        header("location: Welcome.php");
     }else {
        $_SESSION["error"] = $error;
		//header("Location: http://localhost/ISAA_project/loginPage.php");
     }
     CloseCon($con);
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<html>
    <head>
        <title>Login to page</title>
    </head>
    <body>
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
        <nav align='right'>
            <ul style='list-style-type:none;'>
                <li style='display:inline-block; margin-right:15px;'><a href='index.html' style="font-size:1.3em; padding-bottom:3px;text-decoration:none;"><font color="black"><b>Home</b></font></a></li>
            </ul>
        </nav>
        <br>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="font-size:20px;">
        <div style="border-style:groove; height:400px; width:400px; margin:auto; border-color:lightgrey;">
        <br>
        <br>
        <table align="center" border="0" style="border-collapse:collapse; width:30%; padding:50px">
        <caption style="font-size:40px;"><b>Login</b></caption>
        <tr>
        <td style="text-align:center; padding:30px;">Username:</td>
        <td style="text-align:center;padding:30px;"><input type="text" name="u" placeholder="Enter Username" required ></td>
        </tr>
        <tr>
        <td style="text-align:center;padding:30px;">Password:</td>
        <td style="text-align:center;padding:30px;"><input type="password" name="p" placeholder="Enter Password" required></td>
        </tr>
        <tr>
        </tr>
        <tr>
        <td colspan="2" style="text-align:center; font-size:20px;"><input type="submit" value="Login" style="font-size:20px; padding:5px 22px; "></td>
        </tr>
        </table>
        <?php
    if(isset($_SESSION["error"])){
        $error = $_SESSION["error"];
        echo "<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#FF0000'>$error</font></span>";
    }
?> 
 <?php if(isset($_SESSION['login_user'])){ header('location:Welcome.php'); } ?> 
        <p style="text-align:center; font-size:18px;"><a href="#">Forgot Password? Click Here</p>
        <p style="text-align:center; font-size:18px;"><a href="sign.php">Don't have an Account? Sign-In</a></p>
        </form>
</div>
    </body>
</html>
<?php
    unset($_SESSION["error"]);
?>