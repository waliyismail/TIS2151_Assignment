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
            <li><a class="active">Home</a></li>
            <li><a href="/profileModule/profile.php">Profile</a></li>
            <li style="float:right"><a href="/logout.php">Log Out</a></li>

        </ul>
    </div>

</div>
<?php
  include "functions.php";
  $posts = getMainPost();
 ?>

<div class="row">
    <div class="column left3">
    <h2>HOME FEED</h2>
        <!-- posting -->
          <!-- loop all posts -->
       
        
      <?php
          if(mysqli_num_rows($posts) > 0) {
            while ($post = mysqli_fetch_array($posts)) {
                $post_title = $post["POST_TITLE"];
                $post_content = $post["POST_CONTENT"];
                $post_image = $post["POST_IMAGE"];
                $userid = $post["USER_FORUM_ID"];
                $postid= $post["POST_ID"];
                $forumid= $post["FORUM_ID"];
                $postUpvote = $post["POST_UPVOTE_COUNT"];
                $postDownVote = $post["POST_DOWNVOTE_COUNT"];
                $comment_count = countComment($postid);
               ?>
             <div class="boxborder" >
              <p style="font-size: 14px;" >Forum : <?php        
                include 'database.php';
                $id = $_SESSION['ID'] ;

                $sql = "SELECT FORUM_NAME FROM FORUM WHERE FORUM_ID = '$forumid'"; 

                $result = mysqli_query($conn,$sql);
        
            while($row = mysqli_fetch_assoc($result)) {
 
                echo $row["FORUM_NAME"];
        } 
         ?></p>
              <p style="font-size: 14px;" >Title : <?php echo $post_title ?> | by : @<?php echo $userid ?></p>
              <p style="font-size: 14px;" >Upvote : <?php echo $postUpvote ?></p>
              <p><?php echo $post_content ?></p>
              <?php if (isset($post_image)){ ?>
              <img src="post_images/<?php echo $post_image ?>" alt="" style="width:50%;">
            <?php } ?>
              <br>
              <a href="comment.php?forumid=<?php echo $forumid; ?>&postid=<?php echo $postid ?>" style="font-size: 14px;"> <button><?php echo $comment_count ?> comments</button></a>
              <form action="upvoteProcess.php" method="post">
                <input type="hidden" name="action" value="<?php echo $postid ?>" />
                <input id="Upvote-Submit" type="Submit" name="submit" value="Upvote">
               
              </form>
              <?php if($GLOBALS["currentuserid"] === $userid){?>
              <!-- ability to delete post -->
              
              <?php } ?>
              <form class="report" action="reportProcess.php" method="post">
                <!-- pass in post id and reporter id  -->
                <input type="hidden" name="post_id" value="<?php echo $post["POST_ID"]; ?>"/>
                <input type="hidden" name="reporter_id" value="<?php echo $currentuserid; ?>"/>
                <input type="hidden" name="report_type" value="report_post"/>
                <button type="submit" name="reported" style="font-size: 14px;float:right;">Report Post</button>
              </form>              </div>
        <?php }} ?>

        <br>
    </div>


    <div class="column right3">
       <h3 style="text-align:center;">Subscribed Forum</h3>
        <ul class="ulprof">
            <?php include "forumSubscribed.php"?>

            

        </ul>
<hr>
        <h3 style="text-align:center;">List of All Forum</h3>
        <?php include "forumList.php" ?>

    </div>
</div>


</body>

</html>
