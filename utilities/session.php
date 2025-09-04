<?php
   include 'db_connection.php';
   
   ini_set('session.gc_maxlifetime',100);
   session_set_cookie_params(100);
   session_start();
   
   $con = OpenCon();
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"select username from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:loginPage.php");
      die();
   }
   
   if(time()-$_SESSION["time"] >100)   
    { 
        session_unset(); 
        session_destroy(); 
        header("Location:loginPage.php"); 
    }
?>