<!-- TODO
      1) user session id to be passed
      2) css
      3) forum id to be passed -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/post.css" />
    <title>Create a post</title>
  </head>
  <body>
    <?php
    include "conn.php";
    session_start();
    $GLOBALS['hehe'] = "how are you";
    if(isset($_SESSION["ID"])){
      $currentuserid = $_SESSION["ID"];
    };
    // add post content to database
    if (isset($_POST['submit_post'])){
      $title = $_POST["post_title"];
      $content = $_POST['post_content'];
      $image = $_POST['post_image'];
      $userid =  $_POST['user_forum_id'];
      $forumid= $_POST['forum_id'];
      $sql = "INSERT INTO POST(post_title, post_content, post_image, user_forum_id, forum_id) values ('$title', '$content', '$image', '$userid', '$forumid')";
      $result = mysqli_query($conn, $sql);
      if(!$result) {echo mysqli_error($conn);}
      else {echo "<script> window.alert('Your OPnion Has Been Posted!!!')</script>";}
      }?>
      <?php $FORUM_ID = 1 ;
        $forum_name = "makcik membawang";
       // user id and forum id should be passed from the previos page ?>
    <h4>Create a post</h4>
    <h5>Post as @<?php echo $currentuserid ?> in forum <?php echo $forum_name ?></h3>
    <form class="create-post" action="posting.php" method="post">
      <!-- include post in database -->
      <textarea name="post_title" placeholder="Title" maxlength="300"></textarea><br>
      <textarea name="post_content" rows="5" cols="40"placeholder="Whats your OPnion?"></textarea><br>
      <input type="file" name="post_image">
      <input type="hidden" name="user_forum_id" value=<?php echo $currentuserid;?>>
      <input type="hidden" name="forum_id" value=<?php echo $FORUM_ID;?>>
      <input type="submit" name="submit_post" value="Post">
    </form>
  </body>
</html>
