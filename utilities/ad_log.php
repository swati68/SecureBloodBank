<?php
			include 'db_connection.php';
			$con = OpenCon();
			session_start();

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			/*
			$conn=mysqli_connect("localhost","root","12345");
			if(!$conn)
			{
				die("Connection failed:".mysqli_connect_error());
			}
*/
		$options = [ 
			'cost' => 10, 
			'salt' => '$P27r06o9!nasda57b2M22'
		];
			$user=mysqli_real_escape_string($con,$_POST['u']);
			$pass=mysqli_real_escape_string($con,$_POST['p']);
			$pass = password_hash($pass, PASSWORD_BCRYPT, $options);
			$error="Invalid Username or Password";
			$sql="SELECT * FROM admin WHERE username='$user' AND passcode='$pass'";
			mysqli_select_db($con,'isaa_project');
			$result=mysqli_query($con,$sql);
			$numrow=mysqli_num_rows($result);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			if($numrow==1 ) {
					$_SESSION["login_user"]=$user;
					header("location: ap_option.php");
                    //header("Location: http://localhost/ISAA_project/ap_option.html");
    		}
			else {
				$_SESSION["error"] = $error;
				//header("Location: http://localhost/ISAA_project/admin_log.php");
			}
			CloseCon($con);
			//mysqli_close($conn);
}
?>
<html>
    <head>
        <title>Admin</title>
    </head>
    <body>
        <div>
            <marquee><h3><font color="red">This is a demo website created by the students of Vellore Institute of Technology,Chennai. But please donate plasma if you are a COVID-19 survivor. Your small Contribution can save somone's life.</font></h3></marquee>
            </div>
        <header>
            <div style="height:180px;">
                <img src='../assets/images/government-of-india.jpg' id='logo' height='180' width='360' align='left'/>
                <br><br>
                <h1 align="center"><font color="blue">Government of India Blood and Plasma Bank for COVID-19 Pandemic</font></h1>
            </div>
        </header>
        <nav align='right'>
            <ul style='list-style-type:none;'>
                <li style='display:inline-block; margin-right:15px;'><a href='../index.html' style="font-size:1.3em; padding-bottom:3px;text-decoration:none;"><font color="black"><b>Home</b></font></a></li>
            </ul>
        </nav>
        <br><br><br>
        <form method="POST" action="" style="font-size:20px;">
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
        <td colspan="2" style="text-align:center; font-size:20px;"><input type="submit" value="Login" name="submit" style="font-size:20px; padding:5px 22px; "></td>
        </tr>
        </table>
        <?php
    if(isset($_SESSION["error"])){
        $error = $_SESSION["error"];
        echo "<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#FF0000'>$error</font></span>";
    }
?>  
 <?php if(isset($_SESSION['login_user'])){ header('location:ap_option.php'); } ?> 
        <p style="text-align:center; font-size:18px;"><a href="#">Forgot Password? Click Here</p>
        <p style="text-align:center; font-size:18px;"><a href="sign.php">Don't have an Account? Sign-In</a></p>
        </form>
</div>
    </body>
</html>
<?php
    unset($_SESSION["error"]);
?>