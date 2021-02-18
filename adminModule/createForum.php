<?php
  include "database.php";
  session_start();

  if(isset($_SESSION["ID"])){
    $currentadminid = $_SESSION["ID"];
  };

  if (isset($_POST["create_forum"]))
  {
    $forum_name = $_POST["forum_name"];
    $forum_about = $_POST["forum_about"];
    if(empty($forum_name)|| empty($forum_about)){
      echo "<script> window.alert('Please fill in all input')</script>";
    }else{

      $sql = "INSERT INTO FORUM(forum_name,forum_about) values ('$forum_name', '$forum_about')";
      $result = mysqli_query($conn, $sql);
      if(!$result) {echo mysqli_error($conn);}
      else {echo "<script> window.alert('Forum has been created')</script>";}
    }
  }

  function getForum()
  {
    $sql = "SELECT forum_id, FORUM_NAME FROM FORUM";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if(!$result) {echo mysqli_error($conn);}

    return mysqli_fetch_all($result);
  }
 ?>
