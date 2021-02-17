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
      $userid='waliywow'; // post author id
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
      <?php

      //deleting comment
       if(isset($_POST["delete_comment"])){

         $comment_id = $_POST["comment_id"];
         $sql = "DELETE FROM COMMENT WHERE COMMENT_ID=$comment_id";
         $result = mysqli_query($conn, $sql);
         if(!$result) {echo mysqli_error($conn);}
         else {echo "<script> window.alert('Your Comment Has Been Deleted!!!');</script>";}
       }
       if(isset($_POST["delete_post"])){

         $post_id = $_POST["post_id"];
         // find associated comment first
         $deletecomment = "DELETE FROM COMMENT WHERE POST_ID=$post_id";
         $result = mysqli_query($conn, $deletecomment);
         if(!$result) {echo mysqli_error($conn);}

         // delete post
         $sql = "DELETE FROM POST WHERE POST_ID=$post_id";
         $result = mysqli_query($conn, $sql);
         if(!$result) {echo mysqli_error($conn);}
         else {echo "<script> window.alert('Your OPnion Has Been Deleted');window.location='/feedModule'</script>";}
       }
       ?>
      <div class="post-content">
        <!-- user id, user avatar, post content -->
        <!-- get post by id then display here -->
        <h4 class="post-title"><?php echo $post["POST_TITLE"]; ?></h4>
        <p class="post-text"><?php echo $post["POST_CONTENT"]; ?></p>
        <p class="post-author">Posted by <b>@<?php echo $author["USER_FORUM_ID"];?></b> in forum <b><?php echo $forum_name?></b></p>

        <?php if($post["POST_IMAGE"] != NULL) {?><img src="<?php echo $post["POST_IMAGE"]; ?>" alt=""> <?php } ?>
        <button type="button">Upvote</button>
        <form class="report" action="report.php" method="post">
          <!-- pass in post id and reporter id  -->
          <input type="hidden" name="post_id" value="<?php echo $postid; ?>"/>
          <input type="hidden" name="reporter_id" value="<?php echo $currentuserid; ?>"/>
          <input type="hidden" name="report_type" value="report_post"/>

          <input type="submit" name="reported" value="Report Post" >
        </form>
        <!-- if post author this button shows up -->
        <?php if($currentuserid === $author["USER_FORUM_ID"]){?>
          <!-- ability to delete comment -->
          <form class="" action="#" method="post">
            <input type="hidden" name="post_id" value="<?php echo $post["POST_ID"]; ?>">
            <input type="submit" name="delete_post" value="Delete Post">
          </form>
          <?php } ?>
        <!-- if user is logged in -->
        <div class="user-comment">
          <p>Comment as<b> @<?php echo $currentuserid; ?></b></p>
          <form class="comment" action="post.php" method="post">
            <!-- add comment to database -->
            <textarea name="comment_text" placeholder="What is on your mind?"></textarea>
            <!-- other info to be added -->
            <input type="file" name="comment_image" accept="image/png, image/jpeg"/>
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
                  <p class="comment-author"><b>@<?php echo $comment_author["USER_FORUM_ID"]; ?></b></p>
                  <p class="comment-text"><?php echo $row["COMMENT_TEXT"]; ?></p>
                  <button type="button">Upvote</button>
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
                    <form class="" action="post.php" method="post">
                      <input type="hidden" name="comment_id" value="<?php echo $row["COMMENT_ID"]; ?>">
                      <input type="submit" name="delete_comment" value="Delete Comment">
                    </form>
                  <?php } ?>
                </div>
             <?php } } ?>

      </div>
    </div>
    <script type="text/javascript">
      function confirmDelete(){
        var r = window.confirm("Are you sure you want to delete this?");
        if(r)
        {

        }
        // if yes -> remove from database
      }
      function reportDetails(){
        var report = window.prompt("please state why this post/comment is inappropriate?");

      }
    </script>
  </body>
</html>
