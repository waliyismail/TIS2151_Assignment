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
            <li><a href="adminMain.php">Forum</a></li>
            <li><a class="active">User Report</a></li>
            <li><a href="adminManage.php">Account Management</a></li>
            <li style="float:right"><a href="/logout.php">Log Out</a></li>
        </ul>
    </div>
</div>

<?php include "adminfunc.php";
  $posts = getReports();
  
 ?>
<div class="row">
    <div class="column left3">
    <h2>User Report</h2>

    <?php
          if(mysqli_num_rows($posts) > 0) {
            while ($post = mysqli_fetch_array($posts)) {
                //  PUT IN VALUE OF UPVOTE DOWNVOTE
                $post_title = $post["POST_TITLE"];
                $post_content = $post["POST_CONTENT"];
                $post_image = $post["POST_IMAGE"];
                $userid = $post["USER_FORUM_ID"];
                $postid= $post["POST_ID"];
                $postUpvote = $post["POST_UPVOTE_COUNT"];
                $postDownVote = $post["POST_DOWNVOTE_COUNT"];
               ?>
             <div class="boxborder" >
              <p style="font-size: 14px;" >Title : <?php echo $post_title ?> | by : @<?php echo $userid ?></p>
              <p style="font-size: 14px;" >Upvote : <?php echo $postUpvote ?> | Downvote : @<?php echo $postDownVote ?></p>
              <p><?php echo $post_content ?></p>
              <?php if (isset($post_image)){ ?>
              <img src="post_images/<?php echo $post_image ?>" alt="" style="width:50%;">
            <?php } ?>
              <br>
              <a href="comment.php?forumid=<?php echo $forum["FORUM_ID"]; ?>&postid=<?php echo $postid ?>" style="font-size: 14px;"></a>

              
              <!-- ability to delete post -->
              <form class="" action="deletePostAdmin.php" method="post">
                <input type="hidden" name="post_id" value="<?php echo $post["POST_ID"]; ?>">
                <input type="hidden" name="forum_id" value="<?php echo $post["FORUM_ID"]; ?>">
                <input type="submit" name="delete_post" value="Delete Post">
              </form>
         
              </div>
        <?php }} ?>




        <br>

        <br>
    </div>
    <div class="column right3">

        <h2 style="margin-top:0;text-align:center;">ADMIN</h2>
        <p style="margin-top:-1em;text-align:center;">@admin</p>


    </div>
</div>



<div class = "loginboxx" style="height:7em;padding:3em;padding-top:2em;text-align:center;background-color:#283061;">
    Copyright OPnion. All rights reserved
    @2021 Online Generated Content Web Forum System
</div>

</body>

</html>
