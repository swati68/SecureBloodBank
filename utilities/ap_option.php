<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
    <head>
		<title>Login to page</title>
		<link href="../assets/css/style.css" type="text/css" rel="stylesheet" />
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

        <div style='background-color:blue;'>
            <nav align='right'>
                <ul style='list-style-type:none;'>
                    <li style='display:inline-block; margin-right:15px;'><a href='logOutAd.php' style="font-size:1.3em; padding-bottom:3px;text-decoration:none;"><font color="white">Sign-out</font></a></li>
                </ul>
            </nav>
        </div>

        <div align="center">
            <a href="http://localhost/ISAA_project/user_tab.php"><button style="padding:10px 20px; font-size:1.3em;">View Users</button></a>
            <br><br>
            <a href="http://localhost/ISAA_project/blood_view.php"><button style="padding:10px 20px; font-size:1.3em;">Blood Availability</button></a>
            <br>
            <br>
            <a href="http://localhost/ISAA_project/plasma_view.php"><button style="padding:10px 20px; font-size:1.3em;">Plasma Availability</button></a>
            <br><br>
            <a href="http://localhost/ISAA_project/order_blood.php"><button style="padding:10px 20px; font-size:1.3em;">View Donations</button></a>
            <br><br>
            <a href="http://localhost/ISAA_project/order_blood.php"><button style="padding:10px 20px; font-size:1.3em;">View Orders</button></a>
        </div>
    </body>
</html>
