        <?php
        include 'db_connection.php';
        $con = OpenCon();
        session_start();
        $err1="";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            /*
            $conn=mysqli_connect("localhost","root","12345");
			if(!$conn)
			{
				die("Connection failed:".mysqli_connect_error());
            }*/
            $bank_name = test_input(mysqli_real_escape_string($con,$_POST['pb_name']));
            $quantity = test_input(mysqli_real_escape_string($con,$_POST['qty']));
            if($quantity<=0){
                $err1="Please enter a Valid Quantity";
            }
            else{
                $stmt=$con->prepare("INSERT INTO plasma (bank_name,quantity) VALUES (?,?)");
                $stmt->bind_param("ss",$bank_name,$quantity);
            //$e = "INSERT INTO plasma (bank_name,quantity) VALUES ('$bank_name','$quantity')";
            //mysqli_select_db($conn,'isaa_project');
            //$res = mysqli_query($con,$e);
            $res=$stmt->execute();
            if($res){
                header("location:p_add_done.php");
            }
            else{
                    echo mysqli_error($con);
            }
            //mysqli_close($conn);
            CloseCon($con);
        }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        ?>

<!DOCTYPE html>
<html>
    <head>
		<title>Login to page</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
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

        <div style='background-color:blue;'>
            <nav align='right'>
                <ul style='list-style-type:none;'>
                    <li style='display:inline-block; margin-right:15px;'><a href='plasma_view.php' style="font-size:1.3em; padding-bottom:3px;text-decoration:none;"><font color="white">Back</font></a></li>
                </ul>
            </nav>
        </div>
        <div style="background-color:blue;">
            <h2 align="center"><font color="white">Enter the Required Data</font></h2>
        </div>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" align="center" style="font-size:20px;">
            <div style="border-style:groove; height:300px; width:700px; margin:auto; border-color:lightgrey;">
                <br><br>
                <table align="center" border="0" style="border-collapse:collapse; width:80%; padding:50px">
                    <tr>
                        <td style = "text-align:center; padding:10px 20px;">Plasma Bank Name:</td>
                        <td style="text-align:center; padding:10px 20px;"><input type="text" name="pb_name"></td>
                    </tr>
                    <tr>
                        <td style = "text-align:center; padding:10px 20px;">Quantity Available:</td>
                        <td style = "text-align:center; padding:10px 20px;"><input type="number" name="qty">&nbsp;&nbsp;mL</td>
                    </tr>
                    
                    <tr>
                        <td style="text-align:center;padding:10px 20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center; font-size:20px;"><input type="submit" value="Submit" name="submit" style="font-size:20px; padding:5px 22px; "></td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>