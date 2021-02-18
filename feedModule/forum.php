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
  include "forumBackend.php";
 ?>
<div class="row">
    <div class="column left3">
    <h2>FORUM NAME : <?php echo $GLOBALS['forum_name'] ?></h2>
    <h3>About : <?php echo $GLOBALS['forum_about'] ?></h3>
        <!-- create post -->
        <div style="background-color: rgb(220, 237, 255);padding-left:2em;padding-right:4em;border: 3px solid #ccc;padding:1em;margin:2em;margin-right:4em;">
            <img src="/public/postsymbol.png" alt="post" style="width:3em;">
            <a href="/discussionModule/createPost.php?in=<?php echo $GLOBALS['forum_name'];?>&id=<?php echo $_GET["forum"]; ?>" ><input style="float:right;" type="text" placeholder="Create Post" name="create" required></a>
        </div>
        <!-- posting -->
          <!-- loop all posts -->
      <?php
          if(mysqli_num_rows($GLOBALS['posts']) > 0) {
            while ($post = mysqli_fetch_array($GLOBALS['posts'])) {
                $post_title = $post["POST_TITLE"];
                $post_content = $post["POST_CONTENT"];
                $post_image = $post["POST_IMAGE"];
                $userid = $post["USER_FORUM_ID"];
                $postid= $post["POST_ID"];
                $comment_count = countComment($postid);
               ?>
             <div class="boxborder" >
              <p style="font-size: 14px;" >Title : <?php echo $post_title ?> | by : @<?php echo $userid ?></p>
              <p><?php echo $post_content ?></p>
              <img src="/public/merdeka1.jpg" alt="Website name" style="width:50%;"><br>
              <a href="comment.php?forumid=<?php echo $_GET["forum"]; ?>&postid=<?php echo $postid ?>" style="font-size: 14px;"> <button><?php echo $comment_count ?> comments</button></a>
              <button>Upvote</button>
              <button>Downvote</button>
              <a href="#"style="font-size: 14px;float:right;"> <button>Report this post</button></a>
              </div>
        <?php }} ?>

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
