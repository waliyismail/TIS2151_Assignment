<?php
  include "forumBackend.php";
  include "../database.php";
  include ("../profileModule/signinProcess.php");
  extract($_POST);


  if(isset($_POST['action'])){
    $id = $_SESSION["ID"];
    if($submit == "Upvote")
    {
    $var = 1;
    $query = "INSERT INTO POST_UPVOTE_DOWNVOTE(USER_FORUM_ID, POST_ID,UPVOTE_STATUS) VALUES ('$id', '$action','$var')";
    echo $id ;
    echo $action ;
    echo $submit;
    $sql=mysqli_query($conn,$query)or header('Location: ' . $_SERVER['HTTP_REFERER']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

    if($submit == "Downvote")
    {
    $var = 0;
    $query = "INSERT INTO POST_UPVOTE_DOWNVOTE(USER_FORUM_ID, POST_ID,UPVOTE_STATUS) VALUES ('$id', '$action','$var')";
    echo $id ;
    echo $action ;
    echo $submit;
    $sql=mysqli_query($conn,$query)or header('Location: ' . $_SERVER['HTTP_REFERER']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
}



 ?>