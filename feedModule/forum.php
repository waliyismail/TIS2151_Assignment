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
  include "functions.php";
  $forum = getForumDetails($_GET["forumid"]);
  $posts = getForumPosts($_GET["forumid"]);
  addPost();
 ?>
<div class="row">
    <div class="column left3">
    <h2>FORUM NAME : <?php echo $forum['FORUM_NAME'] ?></h2>
    <h3>About : <?php echo $forum['FORUM_ABOUT'] ?></h3>
        <!-- create post -->
        <form action="subscribeProcess.php" method="post">
                <input type="hidden" name="action" value="<?php echo $forum['FORUM_ID']?>" />  
                <input id="Submit" type="Submit" name="submit" value="Subscibe">
            </form>
        <div style="background-color: rgb(220, 237, 255);padding-left:2em;padding-right:4em;border: 3px solid #ccc;padding:1em;margin:2em;margin-right:4em;">
            <img src="/public/postsymbol.png" alt="post" style="width:3em;">
            <a href="/discussionModule/createPost.php?forumid=<?php echo $forum['FORUM_ID'];?>" ><input style="float:right;" type="text" placeholder="Create Post" name="create" required></a>
        </div>
        <!-- posting -->
          <!-- loop all posts -->
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
                $comment_count = countComment($postid);
               ?>
             <div class="boxborder" >
              <p style="font-size: 14px;" >Title : <?php echo $post_title ?> | by : @<?php echo $userid ?></p>
              <p style="font-size: 14px;" >Upvote : <?php echo $postUpvote ?> | Downvote : @<?php echo $postDownVote ?></p>
              <p><?php echo $post_content ?></p>
              <?php if (isset($post_image)){ ?>
              <img src="post_images/<?php echo $post_image ?>" alt="" style="width:50%;">
            <?php } ?>
              <br>
              <a href="comment.php?forumid=<?php echo $forum["FORUM_ID"]; ?>&postid=<?php echo $postid ?>" style="font-size: 14px;"> <button><?php echo $comment_count ?> comments</button></a>
              <form action="upvoteProcess.php" method="post">
                <input type="hidden" name="action" value="<?php echo $postid ?>" />
                <input id="Upvote-Submit" type="Submit" name="submit" value="Upvote">
                <input id="Downvote-Submit" type="Submit" name="submit" value="Downvote">
              </form>
              <?php if($GLOBALS["currentuserid"] === $userid){?>
              <!-- ability to delete post -->
              <form class="" action="#" method="post">
                <input type="hidden" name="post_id" value="<?php echo $post["POST_ID"]; ?>">
                <input type="hidden" name="forum_id" value="<?php echo $post["FORUM_ID"]; ?>">
                <input type="submit" name="delete_post" value="Delete Post">
              </form>
              <?php } ?>
              <a href="#"style="font-size: 14px;float:right;"> <button>Report this post</button></a>
              </div>
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
