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

<?php include "commentBackend.php" ?>
<div class="row">
    <div class="column left3">
      <!-- TODO : get forum details -->
    <h2>FORUM NAME : <?php echo $forum_name?></h2>
    <h3>About : You can discuss on all politics on all over the world.</h3>
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
        <?php
        $forum_list = getForum();
        if(empty($forum_list)){
          echo "<p> no forum yet.. </p>";
        }else {        ?>
        <ul class="ulprof">
            <?php foreach ($forum_list as $forum) {
                // echo var_dump($forum_list);
                // echo "           "?>

              <li class="liprof"><a href="/feedModule/forum.php?forum=<?php echo $forum["0"]; ?>&forumname=<?php echo $forum["1"]; ?>"><?php echo $forum["1"]; ?></a></li>
            <?php } ?>

        </ul>
      <?php } ?>
    </div>
  </div>

</body>

</html>
