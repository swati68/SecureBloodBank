<?php
   include('session.php');
?>
<html">
<head>
		<title>Login to page</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
    <div style='margin:auto;width:1200px;'>
            <div>
                <marquee><h3><font color='red'>This is a demo website created by the students of Vellore Institute of Technology,Chennai. But please donate plasma if you are a COVID-19 survivor. Your small Contribution can save somone's life.</font></h3></marquee>
            </div>
        <header>
            <div style='height:180px;'>
                <img src='government-of-india.jpg' id='logo' height='180' width='360' align='left'/>
                <br><br>
                <h1 align='center'><font color='blue'>Government of India Blood and Plasma Bank for COVID-19 Pandemic</font></h1>
            </div>
		</header>
        <div style='background-color:blue;'>
        <nav align='right'>
            <ul style='list-style-type:none;'>
                <li style='display:inline-block; margin-right:360px;'><b><font color='white'><h3>Welcome <?php echo $login_session; ?></h3></font></b></li>
				<li style='display:inline-block; margin-right:15px;'><a href='bdetail.php' style='font-size:1.3em; padding-bottom:3px;text-decoration:none;'><font color='white'>Donate Blood</font></a></li>
				<li style='display:inline-block; margin-right:15px;'><a href='pdetail.php' style='font-size:1.3em; padding-bottom:3px;text-decoration:none;'><font color='white'>Donate Plasma</font></a></li>
				<li style='display:inline-block; margin-right:15px;'><a href='b_buy.php' style='font-size:1.3em; padding-bottom:3px;text-decoration:none;'><font color='white'>Purchase Blood</font></a></li>
				<li style='display:inline-block; margin-right:15px;'><a href='p_buy.php' style='font-size:1.3em; padding-bottom:3px;text-decoration:none;'><font color='white'>Purchase Plasma</font></a></li>
                <li style='display:inline-block; margin-right:15px;'><a href='LogOut.php' style='font-size:1.3em; padding-bottom:3px;text-decoration:none;''><font color='white'>Sign-out</font></a></li>
            </ul>
        </nav>
    </div>
	<div align='center'>
  <img src='6.jpg' height='300' width='1000' />
</div>
  <br><br>
  <div class='container'>
    <div class='slide-container'>
        <span id='slider-image-1'></span>
        <span id='slider-image-2'></span>
        <span id='slider-image-3'></span>
        <span id='slider-image-4'></span>
        <div class='image-container'>
            <img src='1.jpg' class='slider-image'>
            <img src='2.jpg' class='slider-image'>
            <img src='3.jpg' class='slider-image'>
            <img src='4.jpg' class='slider-image'>
        </div>
        <div class='button-container'>
            <a href='#slider-image-1' class='slider-button'></a>
            <a href='#slider-image-2' class='slider-button'></a>
            <a href='#slider-image-3' class='slider-button'></a>
            <a href='#slider-image-4' class='slider-button'></a>
        </div>
    </div>
    <article style='font-size:1.3em; font-family:Courier New; font-style:italic; height:295px; width:630px; border-style:solid; border-color:#C0C0C0; padding-top: 50px; padding-right: 30px; padding-bottom: 50px; padding-left: 30px;'>
    <br><br><br>
    <q>We have to further strengthen our resolve when the world is in crisis, our resolve should overpower the might of the crisis. We have been told since the last century that the 21st century belongs to India.</q>
    <br>
    <p style='text-align:right;'><font color='red'><b>~  PM Narendra Modi</b></font></p>
</article>
<br><br><br><br>
<article style='font-size:1.3em; '>
    <p style='font-style:italic;'><font color='red'><b>IMPORTANT :</b></font></p>
    If you think you have been exposed to novel coronavirus (COVID-19), and have developed any symptoms (cough, fever or difficulty in breathing), 
    <br>
    Feel Free to contact any of these Govt. of India helpline numbers for assistance:
    <br><br>
    <b>Helpline Number: </b>&nbsp;&nbsp; <mark style='background-color: red;'><font color='white'>+91-11-23978046</font></mark>
    <br>
    <b>Toll Free: </b> &nbsp;&nbsp;<mark style='background-color: red;'><font color='white'>1075</font></mark>
    <br>
    <b>Helpline Email ID: </b> &nbsp;&nbsp;<mark style='background-color: red;'><font color='white'>ncov2019@gov.in</font></mark>
</article>
<br><br>
<footer>
    <p style='text-align:center; background-color:blue; font-size:1.1em;'><font color='white'>Copyright of Govt. Of India</font></p>
</footer>
</div>
</html>