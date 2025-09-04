<?php
include 'db_connection.php';
$con = OpenCon();
   session_start();
   
   if(session_destroy()) {
      $curtime=time();
      $tstamp = date('Y-m-d H:i:s',$currtime);
      //$login=$_SESSION['time'];
      $login=$_SESSION['time'];
      $lt=date('Y-m-d H:i:s',$login);
      $user=$_SESSION['login_user'];
   	$sql = "UPDATE logger (LogoutTime) VALUES ('$tstamp') WHERE User='$user' AND LoginTime='$lt'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      header("Location: loginPage.php");
   }
?>