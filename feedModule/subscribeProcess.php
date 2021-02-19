<?php
  
  include ("database.php");
  include ("../profileModule/signinProcess.php");
  extract($_POST);


  if(isset($_POST['action'])){
    $id = $_SESSION["ID"];

    $query = "INSERT INTO SUBSCRIPTION(USER_FORUM_ID, FORUM_ID) VALUES ('$id','$action')";

    if (!mysqli_query($conn,$query)) {
        echo("Error description: " . mysqli_error($conn));
      }

    $sql=mysqli_query($conn,$query) or header('Location: ' . $_SERVER['HTTP_REFERER']);;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
}
 ?>