<?php
  
  include ("database.php");
  include ("../profileModule/signinProcess.php");

  $currentuserid = $_SESSION["ID"];
  extract($_POST);

    $query = "INSERT INTO USER_FORUM_REPORT(POST_ID, USER_FORUM_ID,ADMIN_ID) VALUES ('$post_id','$currentuserid',(SELECT ADMIN_ID
    FROM ADMIN
    LIMIT 1))";

    if (!mysqli_query($conn,$query)) {
        echo("Error description: " . mysqli_error($conn));
      }

    $sql=mysqli_query($conn,$query) or header('Location: ' . $_SERVER['HTTP_REFERER']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
 ?>

