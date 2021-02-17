<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
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
            <li><a href="home.php">Home</a></li>
            <li><a href="/profileModule/profile.php">Profile</a></li>
            <li style="float:right"><a href="/logout.php">Log Out</a></li>

        </ul>
    </div>
</div>


<div class="row">
    <div class="column left3">
      <!-- TODO : get forum details -->
    <h2>FORUM TYPE : POLITIC <?php echo $forum_name?></h2>
    <h3>About : You can discuss on all politics on all over the world.</h3>

    <?php
          include 'database.php';
          session_start();

          if(isset($_SESSION["ID"])){
            $currentuserid = $_SESSION["ID"];
                  // to be change to be dynamically
            $forum_name = "Sdsa";
            $postid=3;
            $userid='waliywow'; // post author id
          };
          if (isset($_POST['add_comment'])){
            $comment_text = $_POST["comment_text"];
            $postid = $_POST['post_id'];
            if(empty($comment_text)){
              echo "<script> window.alert('Please type something before commenting!!')</script>";
            }else{

              $sql = "INSERT INTO COMMENT(comment_text, post_id, user_forum_id) values ('$comment_text', '$postid', '$currentuserid')";
              $result = mysqli_query($conn, $sql);
              if(!$result) {echo mysqli_error($conn);}
              else {echo "<script> window.alert('Your Comment Has Been Posted!!!')</script>";}
            }
            }
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

              $getPost = "SELECT * FROM POST WHERE POST_ID=$postid";
              $post = mysqli_query($conn, $getPost);
              $post = mysqli_fetch_array($post);

              $getComment = "SELECT * FROM COMMENT WHERE POST_ID=$postid";
              $comments = mysqli_query($conn, $getComment);

              $getPostAuthor = "SELECT * FROM USER_FORUM WHERE USER_FORUM_ID='$userid'";
              $author = mysqli_query($conn, $getPostAuthor);
              $author = mysqli_fetch_array($author);
      ?>

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



        <div class="boxborder" >
              <p style="font-size: 14px;" >Title : <?php echo $post["POST_TITLE"]; ?> | by : @<?php echo $author["USER_FORUM_ID"];?></p>
              <p><?php echo $post["POST_CONTENT"]; ?></p>
              <?php if($post["POST_IMAGE"] != NULL) {?>
                <img src="<?php echo $post["POST_IMAGE"]; ?>" alt="Website name" style="width:50%;"><br> <?php } ?>
              <button>Upvote</button>
              <button>Downvote</button>
              <form class="report" action="report.php" method="post">
                <!-- pass in post id and reporter id  -->
                <input type="hidden" name="post_id" value="<?php echo $postid; ?>"/>
                <input type="hidden" name="reporter_id" value="<?php echo $currentuserid; ?>"/>
                <input type="hidden" name="report_type" value="report_post"/>
                <button class="btn" type="submit" name="reported" style="font-size: 14px;float:right;">Report Post</button>
              </form>
              <!-- if post author this button shows up -->
              <?php if($currentuserid === $author["USER_FORUM_ID"]){?>
              <!-- ability to delete comment -->
              <form class="" action="#" method="post">
                <input type="hidden" name="post_id" value="<?php echo $post["POST_ID"]; ?>">
                <input type="submit" name="delete_post" value="Delete Post">
              </form>
              <?php } ?>
              <br>

              <div class="yourcomments">
                  <form action="comment.php" method="post">
                      <label for="about"><b>Your comments :</b></label><br>
                      <textarea name="comment_text" placeholder="..."></textarea>
                      <button type="submit" name="add_comment"style="width:13em;">Comment</button>
                      <input type="hidden" name="post_id" value="<?php echo $postid; ?>"/>
                  </form>
              </div>

              <!-- get all the comments from database loop and display here -->
              <?php
                if(mysqli_num_rows($comments) > 0) {

                   while ($row = mysqli_fetch_array($comments)) {
                    $userid = $row["USER_FORUM_ID"];
                    $comment_author = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM USER_FORUM WHERE USER_FORUM_ID='$userid'"));
                      ?>


                    <div class="comments">
                        <p style="font-size: 14px;" >comment by : @<?php echo $comment_author["USER_FORUM_ID"]; ?></p>
                        <p><?php echo $row["COMMENT_TEXT"]; ?></p>
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
                          <form class="" action="comment.php" method="post">
                            <input type="hidden" name="comment_id" value="<?php echo $row["COMMENT_ID"]; ?>">
                            <input type="submit" name="delete_comment" value="Delete Comment">
                          </form>
                        <?php } ?>

                    </div>

                  <?php } } ?>



            </div>
        <br>
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
