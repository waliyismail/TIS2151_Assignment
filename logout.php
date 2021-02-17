<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: /profileModule/signin.php");
   }
?>