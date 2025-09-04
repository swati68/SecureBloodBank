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
        <br><br><br>
    <?php
    $conn=mysqli_connect("localhost","root","12345");
    if(!$conn)
    {
        die("Connection failed:".mysqli_connect_error());
    }
    
    $sql="SELECT * FROM donate_tab";
    mysqli_select_db($conn,'isaa_project');
    $result=mysqli_query($conn,$sql);
    $numrow=mysqli_num_rows($result);
    if ($numrow > 0) {
        echo "<table align='center' border='2' style='width:50%; '>
                <tr>
                    <th style='text-align:center; padding:15px 20px;'>Username</th>
                    <th style='text-align:center; padding:15px 20px;'>Blood Group</th>
                    <th style='text-align:center; padding:15px 20px;'>Antigen</th>
                    <th style='text-align:center; padding:15px 20px;'>Age</th>
                    <th style='text-align:center; padding:15px 20px;'>Hypertension</th>
                    <th style='text-align:center; padding:15px 20px;'>Diabetes</th>
                    <th style='text-align:center; padding:15px 20px;'>Cardiac Attack</th>
                    <th style='text-align:center; padding:15px 20px;'>Kidney Ailments</th>
                    <th style='text-align:center; padding:15px 20px;'>Epilepsy</th>
                    <th style='text-align:center; padding:15px 20px;'>Any other disease</th>
                    <th style='text-align:center; padding:15px 20px;'>Fasting Blood Sugar</th>
                    <th style='text-align:center; padding:15px 20px;'>Normal Blood Sugar</th>
                    <th style='text-align:center; padding:15px 20px;'>Haemoglobin Level</th>
                </tr>";
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            echo "<tr><td style='text-align:center; padding:15px 20px;'>".$row['user']."</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['blood_grp']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['antigen']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['age']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['hypertension']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['diabetes']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['cardiac']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['kidney']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['epilepsy']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['any_other']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['fast_bs']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['nor_bs']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['haem']. "</td>
                        </tr>";
                    }
      } 
      mysqli_close($conn);
    ?>