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


<div class="row">
    <div class="column left3">
    <h2>Create a post</h2>
        <div class="boxborder">
          <?php
            include "conn.php";
            session_start();
            if(isset($_SESSION["ID"])){
              $currentuserid = $_SESSION["ID"];
            };

            // add post content to database
            if (isset($_POST['submit_post'])){
              $title = $_POST["post_title"];
              $content = $_POST['post_content'];
              $image = $_POST['post_image'];
              $userid =  $_POST['user_forum_id'];
              $forumid= $_POST['forum_id'];
              if(empty($title) || empty($content)){
                echo "<script> window.alert('Please fill in title and content before posting!!')</script>";
              }else{

                $sql = "INSERT INTO POST(post_title, post_content, post_image, user_forum_id, forum_id) values ('$title', '$content', '$image', '$userid', '$forumid')";
                $result = mysqli_query($conn, $sql);
                if(!$result) {echo mysqli_error($conn);}
                else {echo "<script> window.alert('Your OPnion Has Been Posted!!!'); window.location ='/feedModule'; </script>";}
              }

              }?>
              <?php $FORUM_ID = $_GET["id"] ;
                $forum_name = $_GET["in"];
               // user id and forum id should be passed from the previos page ?>
            <h4>Post as @<?php echo $currentuserid ?> in forum <?php echo $forum_name ?></h4>
            <form class="create-post" action="createPost.php" method="post">
              <!-- include post in database -->
              <textarea id="text-title" name="post_title" placeholder="Title" maxlength="120"></textarea><br>
              <textarea name="post_content" rows="5" cols="40"placeholder="What's your OPnion?"></textarea><br>
              <input class="btn" type="file" name="post_image">
              <input type="hidden" name="user_forum_id" value="<?php echo $currentuserid;?>">
              <input type="hidden" name="forum_id" value="<?php echo $FORUM_ID;?>">
              <button class="btn" type="submit" name="submit_post">Post</button>
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
