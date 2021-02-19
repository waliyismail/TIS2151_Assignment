<?php
  
  include ("database.php");
  include ("../profileModule/signinProcess.php");

  $currentuserid = $_SESSION["ID"];
  extract($_POST);

  $query = "DELETE FROM USER_FORUM_REPORT WHERE POST_ID = '$post_id'";
  $sql=mysqli_query($conn,$query);


    $query = "DELETE FROM POST WHERE POST_ID = '$post_id'";

    if (!mysqli_query($conn,$query)) {
        echo("Error description: " . mysqli_error($conn));
      }

    $sql=mysqli_query($conn,$query) or die('Location: ' . $_SERVER['HTTP_REFERER']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
 ?>

