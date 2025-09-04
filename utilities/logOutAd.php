<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: ad_log.php");
   }
?>