<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
    <title>post page</title>
  </head>
  <body>
    <div class="row">
        <div class="column left" >
            <img src="/public/contoth1.png" alt="Website name" style="width:9em;">
        </div>
        <div class="column right" >
            <img src="/public/contoh2.png" alt="website type" style="width:9em;">
        </div>
    </div>

    <div class="behind">
        <div class="navbar">
            <ul>
                <li><a class="active">Home</a></li>
                <li><a href="/profileModule/profile.php">Profile</a></li>
                <li style="float:right"><a href="#contact">Log Out</a></li>

            </ul>
        </div>
    </div>

<div class="row">
    <div class="column left3">
    <!-- add comment -->
    <?php
    include "conn.php";
    session_start();
     //prompt function
     function prompt($prompt_msg){
         echo("<script type='text/javascript'> var report = prompt('".$prompt_msg."'); </script>");

         $answer = "<script type='text/javascript'> document.write(answer); </script>";
         return($answer);
     }

     //program
     // $prompt_msg = "Please state why the post/comment is inappropriate?";
     //       $reportcontent = prompt($prompt_msg);
     // echo $reportcontent;


    if(isset($_SESSION["ID"])){
      $currentuserid = $_SESSION["ID"];
            // to be change to be dynamically
      $forum_name = "Sdsa";
      $postid=3;
      $userid='mrsstyle'; // post author id
    };
    if (isset($_POST['add_comment'])){
      $comment_text = $_POST["comment_text"];
      $comment_image = $_POST['comment_image'];
      $postid = $_POST['post_id'];
      if(empty($comment_text)){
        echo "<script> window.alert('Please type something before commenting!!')</script>";
      }else{

        $sql = "INSERT INTO COMMENT(comment_text, comment_image, post_id, user_forum_id) values ('$comment_text', '$comment_image','$postid', '$currentuserid')";
        $result = mysqli_query($conn, $sql);
        if(!$result) {echo mysqli_error($conn);}
        else {echo "<script> window.alert('Your Comment Has Been Posted!!!')</script>";}
      }
      }?>
    <div class="post-page">
      <?php

        $getPost = "SELECT * FROM POST WHERE POST_ID=$postid";
        $post = mysqli_query($conn, $getPost);
        $post = mysqli_fetch_array($post);

        $getComment = "SELECT * FROM COMMENT WHERE POST_ID=$postid";
        $comments = mysqli_query($conn, $getComment);

        $getPostAuthor = "SELECT * FROM USER_FORUM WHERE USER_FORUM_ID='$userid'";
        $author = mysqli_query($conn, $getPostAuthor);
        $author = mysqli_fetch_array($author);
      ?>
      <div class="post-content">
        <!-- user id, user avatar, post content -->
        <!-- get post by id then display here -->
        <h4 class="post-title"><?php echo $post["POST_TITLE"]; ?></h4>
        <p class="post-text"><?php echo $post["POST_CONTENT"]; ?></p>
        <h4 class="post-author">Posted by <span id="user-tag">@<?php echo $author["USER_FORUM_ID"];?></span> in forum <b><?php echo $forum_name?></b></h4>

        <?php if($post["POST_IMAGE"] != NULL) {?><img src="<?php echo $post["POST_IMAGE"]; ?>" alt=""> <?php } ?>
        <button class="btn" type="button">Upvote</button>
        <form class="report" action="report.php" method="post">
          <!-- pass in post id and reporter id  -->
          <input type="hidden" name="post_id" value="<?php echo $postid; ?>"/>
          <input type="hidden" name="reporter_id" value="<?php echo $currentuserid; ?>"/>
          <input type="hidden" name="report_type" value="report_post"/>
          <button class="btn" type="submit" name="reported">Report Post</button>
        </form>
        <!-- if post author this button shows up -->
        <button class="btn" type="button" onclick="confirmDelete()">Delete post</button>
        <!-- if user is logged in -->
        <div class="user-comment">
          <h4>Comment as <span id="user-tag">@<?php echo $currentuserid; ?></span></h4>
          <form class="comment" action="post.php" method="post">
            <!-- add comment to database -->
            <textarea name="comment_text" placeholder="What's your thought?"></textarea>
            <!-- other info to be added -->
            <input class="btn" type="file" name="comment_image" accept="image/png, image/jpeg"/>
            <input type="hidden" name="post_id" value="<?php echo $postid; ?>"/>

            <button class="btn" type="submit" name="add_comment">Comment</button>
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
                  <p class="comment-author"><b>@<?php echo $comment_author["USER_FORUM_ID"]; ?></b></p>
                  <p class="comment-text"><?php echo $row["COMMENT_TEXT"]; ?></p>
                  <button class="btn" type="button">Upvote</button>
                  <form class="report" action="report.php" method="post">
                    <!-- pass in comment id and reporter id  -->
                    <input type="hidden" name="post_id" value="<?php echo $row["COMMENT_ID"]; ?>"/>
                    <input type="hidden" name="reporter_id" value="<?php echo $currentuserid; ?>"/>
                    <input type="hidden" name="report_type" value="report_comment"/>
                    <input type="submit" name="reported" value="Report Comment" >
                    <!-- if user is the commment author, can delete -->
                  </form>
                  <?php if($currentuserid === $comment_author["USER_FORUM_ID"]){?>
                    <!-- ability to delete comment -->
                    <form class="" action="delete.php" method="post">
                      <input type="submit" name="delete_comment" value="Delete Comment">
                    </form>
                  <?php } ?>
                </div>
             <?php } } ?>
      </div>
    </div>
    <script type="text/javascript">
      function confirmDelete(){
        var r = window.confirm("are you sure you want to delete this?");
        if(r)
        {

        }
        // if yes -> remove from database
      }
      function reportDetails(){
        var report = window.prompt("please state why this post/comment is inappropriate?");

      }
    </script>
  </div>
  <div class="column right3">
     <h3 style="text-align:center;">Subscribed Forum</h3>
      <ul class="ulprof">
          <li class="liprof"><a href="forum.php">Politic</a></li>
          <li class="liprof"><a href="forum.php">Hardware</a></li>

      </ul>
<hr>
      <h3 style="text-align:center;">List of All Forum</h3>
      <ul class="ulprof">
          <li class="liprof"><a href="forum.php">Politic</a></li>
          <li class="liprof"><a href="forum.php">Hardware</a></li>
          <li class="liprof"><a href="forum.php">Gaming</a></li>
          <li class="liprof"><a href="forum.php">Upvote</a></li>
      </ul>
  </div>
</div>
  </body>
</html>
