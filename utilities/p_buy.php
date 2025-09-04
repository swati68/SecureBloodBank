        <?php
        include 'db_connection.php';
        $con = OpenCon();
        session_start();
        $err1="";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $user = $_SESSION["login_user"];
            //$conn=mysqli_connect("localhost","root","12345");
            /*
			if(!$conn)
			{
				die("Connection failed:".mysqli_connect_error());
            }*/
            $name = $user;
            $grp = test_input(mysqli_real_escape_string($con,$_POST['bgroup']));
            $ant = test_input(mysqli_real_escape_string($con,$_POST['pn']));
            $quantity = test_input(mysqli_real_escape_string($con,$_POST['quan']));
            $ag = test_input(mysqli_real_escape_string($con,$_POST['age']));
            $disease = test_input(mysqli_real_escape_string($con,$_POST['dise']));
            $hosp = test_input(mysqli_real_escape_string($con,$_POST['hos']));
            $doctor = test_input(mysqli_real_escape_string($con,$_POST['doc']));
            $pres = test_input(mysqli_real_escape_string($con,$_POST['num']));
            $allergy = test_input(mysqli_real_escape_string($con,$_POST['aller']));
            $urgent = test_input(mysqli_real_escape_string($con,$_POST['urg']));
            if(substr($doctor,0,3)!="Dr."){
                $err5="Include Dr. before name";
            }
            else{
            $stmt = $con->prepare("INSERT INTO buy_plasma (username,blood_grp,antigen,quantity,age,disease,hospital,doctor,presc_num,allergy,urgency) VALUES (?, ?, ?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssssss", $name,$grp,$ant,$quantity,$ag,$disease,$hosp,$doctor,$pres,$allergy,$urgent);
            //$e = "INSERT INTO buy_blood (username,blood_grp,antigen,quantity,age,disease,hospital,doctor,presc_num,allergy,urgency) VALUES ('$name','$grp','$ant','$quantity','$ag','$disease','$hosp','$doctor','$pres','$allergy','$urgent')";
            //mysqli_select_db($con,'isaa_project');
            //$res = mysqli_query($con,$e);
            $res=$stmt->execute();
            /*
            $e = "INSERT INTO buy_plasma (username,blood_grp,antigen,quantity,age,disease,hospital,doctor,presc_num,allergy,urgency) VALUES ('$name','$grp','$ant','$quantity','$ag','$disease','$hosp','$doctor','$pres','$allergy','$urgent')";
            mysqli_select_db($con,'isaa_project');
            $res = mysqli_query($con,$e);*/
            if($res){
                header("location:p_buy_done.php");
            }
            else{
                    //echo mysqli_error($conn);
                    echo "<h2 align='center'>We are unable to process your request at this moment. Please try again later.</h2>";
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
                <li style='display:inline-block; margin-right:15px;'><a href='Welcome.php' style="font-size:1.3em; padding-bottom:3px;text-decoration:none;"><font color="black"><b>Home</b></font></a></li>
            </ul>
        </nav>
        <div style="background-color:blue;">
            <h2 align="center"><font color="white">Plasma Purchase Details</font></h2>
        </div>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" align="center" style="font-size:20px;">
            <div style="border-style:groove; height:600px; width:1000px; margin:auto; border-color:lightgrey;">
                <br><br>
                <span class="error"><font color="red"><?php echo $err1;?></font></span>
                <table align="center" border="0" style="border-collapse:collapse; width:80%; padding:50px">
                    <tr>
                    <td style="text-align:center; padding:10px 20px;">Blood Group:</td>
                    <td style="text-align:center;padding:10px 20px;"><select name="bgroup">
                        <option>--Select--</option>
                        <option>A</option>
                        <option>B</option>
                        <option>AB</option>
                        <option>O</option>
                    </select>&nbsp; &nbsp;&nbsp;&nbsp;
                        <select name="pn">
                            <option selected="selected">--Select--</option>
                            <option>Positive(+ve)</option>
                            <option>Negative(-ve)</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td  style="text-align:center;padding:10px 20px;">Enter the quantity</td>
                        <td  style="text-align:center;padding:10px 20px;"><input type="number" name="quan"> &nbsp;&nbsp;mL</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding:10px 20px;">Age</td>
                        <td style="text-align:center;padding:10px 20px;"><input type="number" name="age" placeholder="Enter your age" min="18" style="padding:4px 15px;" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center; font-size:25px;"><h3>Patient Health details<hr></h3></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding:10px 20px;">Patient Disease</td>
                        <td style="text-align:center;padding:10px 20px;"><input type="text" name="dise"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding:10px 20px;">Hospital Admitted</td>
                        <td style="text-align:center;padding:10px 20px;"><input type="text" name="hos"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding:10px 20px;">Doctor Name</td>
                        <td style="text-align:center;padding:10px 20px;"><input type="text" name="doc"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding:10px 20px;">Doctor Prescription Number</td>
                        <td style="text-align:center;padding:10px 20px;"><input type="number" name="num"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding:10px 20px;">Any allergies to patient</td>
                        <td style="text-align:center;padding:10px 20px;"><input type="text" name="aller"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding:10px 20px;">Urgency</td>
                        <td style="text-align:center;padding:10px 20px;"><input type="radio" name="urg" value="yes">Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="urg" value="no">No</td></td>
                    </tr>
                        <tr>
                        <td colspan="2" style="text-align:center; font-size:20px;"><input type="submit" value="Submit" name="submit" style="font-size:20px; padding:5px 22px; "></td>
                        </tr>
                    </table>
                </table>
            </div>
        </form>
        </body>
        </html>