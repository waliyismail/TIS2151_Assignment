<?php
  include "conn.php";
  session_start();
  if( isset($_POST["reported"])){
    $reporterid = $_POST["reporter_id"];
    $postid = $_POST["post_id"];
    $reporttype = $_POST["report_type"];

  }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <?php echo "under construction" ?>

   </body>
 </html>
