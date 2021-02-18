<?php
  include "../database.php";
  session_start();
  if(isset($_SESSION["ID"])){
    $currentuserid = $_SESSION["ID"];
  };

  //get all Reports
  function getReports()
  {
    $sql = "SELECT * FROM USER_FORUM_REPORT";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if(!$result) {echo mysqli_error($GLOBALS['conn']);}

    return $reports;
  }  // get list of all forum in the database;

  function getPostDetails($postid)
  {
    $getPost = "SELECT * FROM POST WHERE POST_ID=$postid";
    $post =  mysqli_fetch_array(mysqli_query($GLOBALS['conn'], $getPost));
    return $post;
  }
 ?>
