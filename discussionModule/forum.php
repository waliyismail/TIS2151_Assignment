<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/post.css" />
    <title>post page</title>
  </head>
  <body>
    <!-- add comment -->
    <?php
    include "conn.php";
    if (isset($_POST['add_comment'])){
      $comment_text = $_POST["comment_text"];
      $comment_image = $_POST['comment_image'];
      $postid = $_POST['post_id'];
      $userid =  $_POST['commentor_id'];
      $sql = "INSERT INTO COMMENT(comment_text, comment_image, post_id, user_forum_id) values ('$comment_text', '$comment_image','$postid', '$userid')";
      $result = mysqli_query($conn, $sql);
      if(!$result) {echo mysqli_error($conn);}
      else {echo "<script> window.alert('Your Comment Has Been Posted!!!')</script>";}
      }?>
    <div class="post-page">
      <?php


        // to be change to be dynamically
        $postid=3;
        $userid='mrsstyle';
        forum_name
        forum_about
        forum_image
        forum_image_banner
        forum_subscriber_count
        forum_Date_creation
        forum_rules
        user_forum_id
        $getPost = "SELECT * FROM POST WHERE POST_ID=$postid"; // need to change to current user id
        $post = mysqli_query($conn, $getPost);
        $post = mysqli_fetch_array($post);

        $getComment = "SELECT * FROM COMMENT WHERE POST_ID=$postid";
        $comments = mysqli_query($conn, $getComment);

        // $getForum = "SELECT * FROM FORUM WHERE FORUM_ID=$post['FORUM_ID']";
        // $forum = mysqli_query($conn, $getForum);

        $getPostAuthor = "SELECT * FROM USER_FORUM WHERE USER_FORUM_ID='$userid'";
        $author = mysqli_query($conn, $getPostAuthor);
        $author = mysqli_fetch_array($author);
      ?>
      <div class="post-content">
        <!-- user id, user avatar, post content -->
        <!-- get post by id then display here -->
        <h4 class="post-title"><?php echo $post["POST_TITLE"]; ?></h4>
        <p class="post-text"><?php echo $post["POST_CONTENT"]; ?></p>
        <p class="post-author">Posted by @<?php echo $author["USER_FORUM_ID"];?></p>

        <?php if($post["POST_IMAGE"] != NULL) {?><img src="<?php echo $post["POST_IMAGE"]; ?>" alt=""> <?php } ?>
        <button type="button">Upvote</button>
        <button type="button">Downvote</button>
        <button type="button" onclick="reportDetails()">Report post</button>
        <!-- if post author this button shows up -->
        <button type="button" onclick="confirmDelete()">Delete post</button>
        <!-- if user is logged in -->
        <div class="user-comment">
          <?php $currentuser="mrstyle" ?>
          <p>Comment as @<?php echo $currentuser; ?></p>
          <form class="comment" action="post.php" method="post">
            <!-- add comment to database -->
            <textarea name="comment_text" placeholder="what are your thought?"></textarea>
            <!-- other info to be added -->
            <input type="file" name="comment_image"/>
            <input type="hidden" name="commentor_id" value="<?php echo $currentuser; ?>"/>
            <input type="hidden" name="post_id" value="<?php echo $postid; ?>"/>

            <input type="submit" name="add_comment" value="Comment">
          </form>

        </div>
      </div>
      <div class="post-comments">
        <!-- get all the comments from database loop and display here -->
        <?php
          if(mysqli_num_rows($comments) > 0) {

             while ($row = mysqli_fetch_array($comments)) {
               $userid = $row["USER_FORUM_ID"];
                $comment_author = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM USER_FORUM WHERE USER_FORUM_ID='$userid'"));
                ?>
                <div class="separated-comment">
                  <p class="comment-author">@<?php echo $comment_author["USER_FORUM_ID"]; ?></p>
                  <p class="comment-text"><?php echo $row["COMMENT_TEXT"]; ?></p>
                  <button type="button">Upvote</button>
                  <button type="button">Downvote</button>
                  <button type="button" onclick="reportDetails()" >Report comment</button>
                </div>
             <?php } } ?>
      </div>
    </div>
    <script type="text/javascript">
      function confirmDelete(){
        var r = window.confirm("are you sure you want to delete this?");
        if(r)
        {
          <?php

           ?>
        }
        // if yes -> remove from database
      }
      function reportDetails(){
        window.prompt("please state why this post/comment is inappropriate?")
        // add to database
      }
    </script>
  </body>
</html>
