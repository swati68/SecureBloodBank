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

$sql="SELECT * FROM user_table";
mysqli_select_db($conn,'isaa_project');
$result=mysqli_query($conn,$sql);
$numrow=mysqli_num_rows($result);
if ($numrow > 0) {
    echo "<table align='center' border='2' style='width:50%; '>
            <tr>
            <th style='text-align:center; padding:15px 20px;'>Name</th>
            <th style='text-align:center; padding:15px 20px;'>Date Of Birth</th>
            <th style='text-align:center; padding:15px 20px;'>Gender</th>
            <th style='text-align:center; padding:15px 20px;'>Marital Status</th>
            <th style='text-align:center; padding:15px 20px;'>Occupation</th>
            <th style='text-align:center; padding:15px 20px;'>Salary</th>
            <th style='text-align:center; padding:15px 20px;'>House Number</th>
            <th style='text-align:center; padding:15px 20px;'>Street Number</th>
            <th style='text-align:center; padding:15px 20px;'>City</th>
            <th style='text-align:center; padding:15px 20px;'>State</th>
            <th style='text-align:center; padding:15px 20px;'>Country</th>
            <th style='text-align:center; padding:15px 20px;'>PIN Code</th>
            <th style='text-align:center; padding:15px 20px;'>Phone Number</th>
            <th style='text-align:center; padding:15px 20px;'>Email Id</th>
				<th style='text-align:center; padding:15px 20px;'>Username</th>
				<th style='text-align:center; padding:15px 20px;'>Password</th>
            </tr>";
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<tr>
        <td style='text-align:center; padding:15px 20px;'>".$row['Name']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['DOB']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['Gender']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['MaritalStatus']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['Occupation']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['Salary']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['HouseNo']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['StreetNo']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['City']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['State']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['Country']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['PIN']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['PhoneNo']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['EmailID']."</td>
        <td style='text-align:center; padding:15px 20px;'>".$row['Username']."</td>
        <td style='text-align:center; padding:15px 20px;'> " .$row['Passcode']. "</td>
                    </tr>";
				}
  } 
  mysqli_close($conn);

?>