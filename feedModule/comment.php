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

<?php
  include "../feedModule/functions.php";
  $forum = getForumDetails($_GET["forumid"]);
  $post = getPostDetails($_GET["postid"]);
  $comments = getPostComments($_GET["postid"]);
  addComment();
  deleteComment();
  deletePost();
?>
<div class="row">
    <div class="column left3">
    <h2>FORUM NAME : <?php echo $forum['FORUM_NAME']?></h2>
    <h3>About : <?php  echo $forum['FORUM_ABOUT'] ?></h3>
        <div class="boxborder" >
              <p style="font-size: 14px;" >Title : <?php echo $post["POST_TITLE"]; ?> | by : @<?php echo $post["USER_FORUM_ID"];?></p>
              <p><?php echo $post["POST_CONTENT"]; ?></p>
              <?php if(is_null($post['POST_IMAGE'])) {?>
                <img src="post_images/<?php echo $post["POST_IMAGE"]; ?>" alt="post image" style="width:50%;"><br> <?php } ?>
              <button>Upvote</button>
              <button>Downvote</button>
              <!-- if post author this button shows up -->
              <?php if($GLOBALS["currentuserid"] === $post["USER_FORUM_ID"]){?>
              <!-- ability to delete post -->
              <form class="" action="#" method="post">
                <input type="hidden" name="post_id" value="<?php echo $post["POST_ID"]; ?>">
                <input type="hidden" name="forum_id" value="<?php echo $post["FORUM_ID"]; ?>">
                <input type="submit" name="delete_post" value="Delete Post">
              </form>
              <?php } ?>
              <form class="report" action="report.php" method="post">
                <!-- pass in post id and reporter id  -->
                <input type="hidden" name="post_id" value="<?php echo $post["POST_ID"]; ?>"/>
                <input type="hidden" name="reporter_id" value="<?php echo $currentuserid; ?>"/>
                <input type="hidden" name="report_type" value="report_post"/>
                <button type="submit" name="reported" style="font-size: 14px;float:right;">Report Post</button>
              </form>

              <br>

              <div class="yourcomments">
                  <form action="comment.php?forumid=<?php echo $forum['FORUM_ID'] ?>&postid=<?php echo $post['POST_ID'] ?>" method="post">
                      <label for="about"><b>Your comments :</b></label><br>
                      <textarea name="comment_text" placeholder="..."></textarea>
                      <button type="submit" name="add_comment"style="width:13em;">Comment</button>
                      <input type="hidden" name="post_id" value="<?php echo $post["POST_ID"]; ?>"/>
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
                        <?php if($GLOBALS['currentuserid'] === $comment_author["USER_FORUM_ID"]){?>
                          <!-- ability to delete comment -->
                          <form class="" action="comment.php?forumid=<?php echo $forum['FORUM_ID'] ?>&postid=<?php echo $post['POST_ID'] ?>" method="post">
                            <input type="hidden" name="comment_id" value="<?php echo $row["COMMENT_ID"]; ?>">
                            <input type="submit" name="delete_comment" value="Delete Comment">
                          </form>
                        <?php } ?>
                        <form class="report" action="report.php" method="post">
                          <!-- pass in comment id and reporter id  -->
                          <input type="hidden" name="post_id" value="<?php echo $row["COMMENT_ID"]; ?>"/>
                          <input type="hidden" name="reporter_id" value="<?php echo $GLOBALS['currentuserid']; ?>"/>
                          <input type="hidden" name="report_type" value="report_comment"/>
                          <button type="submit" name="reported" style="font-size: 14px;float:right;">Report Comment</button>
                          <!-- if user is the commment author, can delete -->
                        </form>


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
        <?php include "../feedModule/forumList.php" ?>
    </div>
  </div>

</body>

</html>
