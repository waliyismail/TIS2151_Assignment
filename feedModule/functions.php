<?php
  // files for all global functions
  include "../database.php";
  session_start();
  if(isset($_SESSION["ID"])){
    $currentuserid = $_SESSION["ID"];
  };

  // get list of all forum in the database;
  function getForumListSubscibed()
  {
    include "../database.php";
    $currentuserid = $_SESSION["ID"];
    $sql = "SELECT forum_id, FORUM_NAME FROM FORUM WHERE FORUM_ID IN (SELECT FORUM_ID FROM SUBSCRIPTION WHERE USER_FORUM_ID = '$currentuserid')";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if(!$result) {echo mysqli_error($conn);}

    return mysqli_fetch_all($result);
  }

  function getForumList()
  {
    include "../database.php";
    $sql = "SELECT forum_id, FORUM_NAME FROM FORUM";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if(!$result) {echo mysqli_error($conn);}

    return mysqli_fetch_all($result);
  }

  function getMainPost()
  {
    include "../database.php";
    $currentuserid = $_SESSION["ID"];

    $getPosts = "SELECT * FROM POST WHERE FORUM_ID IN (SELECT FORUM_ID WHERE USER_FORUM_ID = '$currentuserid')";
    $posts= mysqli_query($GLOBALS['conn'], $getPosts);

    return $posts;
  }


  // count comment from given post id
  function countComment($postid)
  {
    include "../database.php";
    $sql = "SELECT * FROM COMMENT where POST_ID=$postid";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if(!$result) {echo mysqli_error($conn);}
    $n = mysqli_num_rows($result);
    return $n;
  }

  // get the forum details from given forum id and set the details to be global
  function getForumDetails($forumid)
  {
      // get all post from the forum
      $getForum = "SELECT * FROM FORUM WHERE FORUM_ID=$forumid";
      $forum = mysqli_fetch_array(mysqli_query($GLOBALS['conn'], $getForum));
      //echo $forum["FORUM_NAME"];
      return $forum;
      // $GLOBALS['forum_id']= $forum["FORUM_ID"];
      // $GLOBALS['forum_name']= $forum["FORUM_NAME"];
      // $GLOBALS['forum_about']=$forum["FORUM_ABOUT"];
  }

  // get the post details from id
  function getPostDetails($postid)
  {
    $getPost = "SELECT * FROM POST WHERE POST_ID=$postid";
    $post =  mysqli_fetch_array(mysqli_query($GLOBALS['conn'], $getPost));
    return $post;
  }

  // get all the posts in the forum
  // return $posts array of posts
  function getForumPosts($forumid){

    $getPosts = "SELECT * FROM POST WHERE FORUM_ID=$forumid";
    $posts= mysqli_query($GLOBALS['conn'], $getPosts);
    return $posts;

  }

  // get array of comments from given posts
  // needed for comment page given post id
  function getPostComments($postid)
  {
      $getComments = "SELECT * FROM COMMENT WHERE POST_ID=$postid";
      //$GLOBALS['comments'] = mysqli_query($conn, $getComments);
      $comments = mysqli_query($GLOBALS['conn'], $getComments);
      return $comments;
  }

  // add post to database from $_POST
  function addPost()
  {
    if (isset($_POST['submit_post']))
    {

      $title = $_POST["post_title"];
      $content = $_POST['post_content'];
      $imgname = $_FILES['post_image']['name'];
      $imgdir ="post_images/" .$imgname;
      $userid =  $_POST['user_forum_id'];
      $forumid= $_POST['forum_id'];
      move_uploaded_file($_FILES['post_image']['tmp_name'],$imgdir);

      if(empty($title) || empty($content))
      {
        echo "<script> window.alert('Please fill in title and content before posting!!')</script>";
      }else{

        $sql = "INSERT INTO POST(post_title, post_content, post_image, user_forum_id, forum_id) values ('$title', '$content', '$imgname', '$userid', '$forumid')";
        $result = mysqli_query($GLOBALS['conn'], $sql);
        if(!$result) {echo mysqli_error($GLOBALS['conn']);}
        else {echo "<script> window.alert('Your OPnion Has Been Posted!'); </script>";}
        header('Location: /feedModule/forum.php?forumid='. $forumid );
      }

    }
  }

  function addComment()
  {
    if (isset($_POST['add_comment'])){
      $comment_text = $_POST["comment_text"];
      $postid = $_POST['post_id'];
      if(empty($comment_text)){
        echo "<script> window.alert('Please type something before commenting!!')</script>";
      }else{
        $currid = $GLOBALS["currentuserid"];
        $sql = "INSERT INTO COMMENT(comment_text, post_id, user_forum_id) values ('$comment_text', '$postid', '$currid')";
        $result = mysqli_query($GLOBALS['conn'], $sql);
        if(!$result) {echo mysqli_error($GLOBALS['conn']);}
        else {echo "<script> window.alert('Your Comment Has Been Posted!!!');</script>";}
        header('Location: ' . $_SERVER['HTTP_REFERER']);
      }
      }
  }

  function deletePost()
  {

    if(isset($_POST["delete_post"])){

      $post_id = $_POST["post_id"];
      $forumid = $_POST['forum_id'];
      // find associated comment first
      $deletecomment = "DELETE FROM COMMENT WHERE POST_ID=$post_id";
      $result = mysqli_query($GLOBALS['conn'], $deletecomment);
      if(!$result) {echo mysqli_error($GLOBALS['conn']);}

      // delete post
      $sql = "DELETE FROM POST WHERE POST_ID=$post_id";
      $result = mysqli_query($GLOBALS['conn'], $sql);
      if(!$result) {echo mysqli_error($GLOBALS['conn']);}
      else {echo "<script> window.alert('Your OPnion Has Been Deleted');</script>";}
      header('Location: /feedModule/forum.php?forumid='. $forumid );
    }
  }

  function deleteComment()
  {
    if(isset($_POST["delete_comment"])){

      $comment_id = $_POST["comment_id"];
      $sql = "DELETE FROM COMMENT WHERE COMMENT_ID=$comment_id";
      $result = mysqli_query($GLOBALS['conn'], $sql);
      if(!$result) {echo mysqli_error($GLOBALS['conn']);}
      else {echo "<script> window.alert('Your OPnion Has Been Deleted');</script>";}
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  }
 ?>
