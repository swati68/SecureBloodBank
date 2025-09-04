        <?php
        include 'db_connection.php';
        $con = OpenCon();
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $user = $_SESSION["login_user"];
            /*
            $conn=mysqli_connect("localhost","root","12345");
			if(!$conn)
			{
				die("Connection failed:".mysqli_connect_error());
            }*/
            $name = $user;
            $grp = test_input(mysqli_real_escape_string($con,$_POST['bgroup']));
            $ant = test_input(mysqli_real_escape_string($con,$_POST['pn']));
            $ag = test_input(mysqli_real_escape_string($con,$_POST['age']));
            $rec_date = test_input(mysqli_real_escape_string($con,$_POST['cov']));
            $h_name = test_input(mysqli_real_escape_string($con,$_POST['hos']));
            $duration = test_input(mysqli_real_escape_string($con,$_POST['dur']));
            $symptom  = test_input(mysqli_real_escape_string($con,$_POST['sym']));
            $hyp = test_input(mysqli_real_escape_string($con,$_POST['hyper']));
            $diabetes = test_input(mysqli_real_escape_string($con,$_POST['diab']));
            $cardiac = test_input(mysqli_real_escape_string($con,$_POST['card']));
            $kidney = test_input(mysqli_real_escape_string($con,$_POST['kidail']));
            $epilepsy = test_input(mysqli_real_escape_string($con,$_POST['epi']));
            $other = test_input(mysqli_real_escape_string($con,$_POST['heal']));
            $fasting = test_input(mysqli_real_escape_string($con,$_POST['fsugar']));
            $normal = test_input(mysqli_real_escape_string($con,$_POST['rsugar']));
            $haemoglo = test_input(mysqli_real_escape_string($con,$_POST['haem']));
            $wbc_count = test_input(mysqli_real_escape_string($con,$_POST['wbc']));
            $rbc_count = test_input(mysqli_real_escape_string($con,$_POST['rbc']));
            $stmt = $con->prepare("INSERT INTO plasma_tab (username,blood_grp,antigen,age,date_recovery,hosp_name,duration,sump,hypertension,diabetes,cardiac,kidney,epilepsy,any_other,fsugar,nsugar,haem,wbc,rbc) VALUES (?, ?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssssssssssssss", $name,$grp,$ant,$ag,$rec_date,$h_name,$duration,$symptom,$hyp,$diabetes,$cardiac,$kidney,$epilepsy,$other,$fasting,$normal,$haemoglo,$wbc_count,$rbc_count);
            //$e = "INSERT INTO buy_blood (username,blood_grp,antigen,quantity,age,disease,hospital,doctor,presc_num,allergy,urgency) VALUES ('$name','$grp','$ant','$quantity','$ag','$disease','$hosp','$doctor','$pres','$allergy','$urgent')";
            mysqli_select_db($con,'isaa_project');
            //$res = mysqli_query($con,$e);
            $res=$stmt->execute();
            /*
            $e = "INSERT INTO plasma_tab (username,blood_grp,antigen,age,date_recovery,hosp_name,duration,sump,hypertension,diabetes,cardiac,kidney,epilepsy,any_other,fsugar,nsugar,haem,wbc,rbc) VALUES ('$name','$grp','$ant','$ag','$rec_date','$h_name','$duration','$symptom','$hyp','$diabetes','$cardiac','$kidney','$epilepsy','$other','$fasting','$normal','$haemoglo','$wbc_count','$rbc_count')";
            mysqli_select_db($con,'isaa_project');
            $res = mysqli_query($con,$e);*/
            if($res){
                header("location:pdetail_done.php");
            }
            else{
                    //echo mysqli_error($conn);
                    echo "<h2 align='center'>We are unable to process your request at this moment. Please try again later.</h2>";
            }
            //mysqli_close($conn);
            CloseCon($con);
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
            <h2 align="center"><font color="white">Plasma Donation Details</font></h2>
        </div>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" align="center" style="font-size:20px;">
            <div style="border-style:groove; height:1130px; width:1000px; margin:auto; border-color:lightgrey;">
                <br><br>
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
                        <td style="text-align:center;padding:10px 20px;">Age</td>
                        <td style="text-align:center;padding:10px 20px;"><input type="number" name="age" placeholder="Enter your age" min="18" style="padding:4px 15px;" required></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;padding:10px 20px;">Date of COVID-19 Recovery</td>
                            <td style="text-align:center;padding:10px 20px;"><input type="date" name="cov"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;padding:10px 20px;">Name of the Hospital</td>
                            <td style="text-align:center;padding:10px 20px;"><input type="text" name="hos"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;padding:10px 20px;">Duration of COVID-19(in Days)</td>
                            <td style="text-align:center;padding:10px 20px;"><input type="number" name="dur"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;padding:10px 20px;">Major Symptom During COVID(if any)</td>
                            <td style="text-align:center;padding:10px 20px;"><input type="text" name="sym"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center; font-size:25px;"><h3>Past Health details<hr></h3></td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding:10px 20px;">Hypertension</td>
                            <td style="text-align:center; padding:10px 20px;"><input type="radio" name="hyper" value="yes">Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="hyper" value="no">No</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding:10px 20px;">Diabetes</td>
                            <td style="text-align:center; padding:10px 20px;"><input type="radio" name="diab" value="yes">Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="diab" value="no">No</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding:10px 20px;">Cardiac Arrest</td>
                            <td style="text-align:center; padding:10px 20px;"><input type="radio" name="card" value="yes">Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="card" value="no">No</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding:10px 20px;">Kidney Ailment</td>
                            <td style="text-align:center; padding:10px 20px;"><input type="radio" name="kidail" value="yes">Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="kidail" value="no">No</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding:10px 20px;">Epilepsy</td>
                            <td style="text-align:center; padding:10px 20px;"><input type="radio" name="epi" value="yes">Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="epi" value="no">No</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding:10px 20px;">Any Other Health records</td>
                            <td style="text-align:center; padding:10px 20px;"><input type="text" name="heal"> </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center; font-size:25px;"><h3>Current Health details<hr></h3></td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding:10px 20px;">Fasting Blood Sugar level</td>
                            <td style="text-align:center; padding:10px 20px;"><input style="number" name="fsugar">&nbsp;mg/dL</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding:10px 20px;">Normal Blood Sugar level</td>
                            <td style="text-align:center; padding:10px 20px;"><input style="number" name="rsugar">&nbsp;mg/dL</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding:10px 20px;">Haemoglobin level</td>
                            <td style="text-align:center; padding:10px 20px;"><input style="number" name="haem">&nbsp;g/dL</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding:10px 20px;">WBC Count</td>
                            <td style="text-align:center; padding:10px 20px;"><input style="number" name="wbc">&nbsp;mg/dL</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding:10px 20px;">RBC Count</td>
                            <td style="text-align:center; padding:10px 20px;"><input style="number" name="rbc">&nbsp;mg/dL</td>
                        </tr>
                        <br>
                        <tr>
                        <td colspan="2" style="text-align:center; font-size:20px;"><input type="submit" value="Submit" name="submit" style="font-size:20px; padding:5px 22px; "></td>
                        </tr>
                    </table>
                </table>
            </div>
        </form>
        </body>
        </html>