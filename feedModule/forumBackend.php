<?php
  include "database.php";
  session_start();

  if(isset($_GET['forum']))
  {
    $currforumid = $_GET['forum'];
    // get all post from the forum
    $getForum = "SELECT * FROM FORUM WHERE FORUM_ID=$currforumid";
    $forum = mysqli_fetch_array(mysqli_query($conn, $getForum));
    //echo $forum["FORUM_NAME"];
    $GLOBALS['forum_id']= $forum["FORUM_ID"];
    $GLOBALS['forum_name']= $forum["FORUM_NAME"];
    $GLOBALS['forum_about']=$forum["FORUM_ABOUT"];

    $getPosts = "SELECT * FROM POST WHERE FORUM_ID=$currforumid";
    $GLOBALS['posts'] = mysqli_query($conn, $getPosts);
    // echo $posts["POST_CONTENT"];
  }
  if(isset($_SESSION["ID"])){
    $currentuserid = $_SESSION["ID"];
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

  function countComment($postid)
  {
    $sql = "SELECT * FROM COMMENT where POST_ID=$postid";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if(!$result) {echo mysqli_error($conn);}
    $n = mysqli_num_rows($result);
    return $n;
  }

?>
