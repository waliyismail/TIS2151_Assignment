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
            <li style="float:right"><a href="#contact">Log Out</a></li>

        </ul>
    </div>
</div>

<?php
  include "../feedModule/functions.php";
  $forum = getForumDetails($_GET["forumid"]);
  $posts = getForumPosts($_GET["forumid"]);
?>
<div class="row">
    <div class="column left3">
    <h2>Create a post</h2>
        <div class="boxborder">
            <h4>Post as @<?php echo $GLOBALS['currentuserid'] ?> in forum <?php echo $forum['FORUM_NAME'] ?></h4>
            <form class="create-post" action="../feedModule/forum.php?forumid=<?php echo $forum['FORUM_ID']  ?>" method="post">
              <!-- include post in database -->
              <textarea id="text-title" name="post_title" placeholder="Title" maxlength="120"></textarea><br>
              <textarea name="post_content" rows="5" cols="40"placeholder="What's your OPnion?"></textarea><br>
              <input type="file" name="post_image">
              <input type="hidden" name="user_forum_id" value="<?php echo $currentuserid;?>">
              <input type="hidden" name="forum_id" value="<?php echo $forum['FORUM_ID'];?>">
              <button type="submit" name="submit_post" style="font-size: 14px;float:right;">Post</button>
            </form>

        </div>
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
