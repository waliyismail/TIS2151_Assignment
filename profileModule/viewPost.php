<!DOCTYPE html>


<?php 
    include('signinProcess.php');
?>
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
            <li><a href="/feedModule/home.php">Home</a></li>
            <li><a class="active" >Profile</a></li>
            
            <li style="float:right"><a href="/logout.php">Log Out</a></li>
          
        </ul>
    </div>
</div>


<div class="row">
    <div class="column left3">
    <h2>Your Post</h2>
        <div class="boxborder">
             <?php
        include 'database.php';

        function countComment($postid)
        {
          include "database.php";
          $sql = "SELECT * FROM COMMENT where POST_ID=$postid";
          $result = mysqli_query($GLOBALS['conn'], $sql);
          if(!$result) {echo mysqli_error($conn);}
          $n = mysqli_num_rows($result);
          return $n;
        }
        $id = $_SESSION['ID'] ;

        $sql = "SELECT * FROM POST WHERE POST_ID IN (SELECT POST_ID FROM POST_UPVOTE_DOWNVOTE WHERE USER_FORUM_ID = '$id' AND UPVOTE_STATUS = 1 GROUP BY POST_ID)"; 

        $result = mysqli_query($conn,$sql);
        
        while ($post = mysqli_fetch_array($result)) {
                //  PUT IN VALUE OF UPVOTE DOWNVOTE 
                $post_title = $post["POST_TITLE"];
                $post_content = $post["POST_CONTENT"];
                $post_image = $post["POST_IMAGE"];
                $userid = $post["USER_FORUM_ID"];
                $postid= $post["POST_ID"];
                $postUpvote = $post["POST_UPVOTE_COUNT"];
                $postForumID = $post["FORUM_ID"];
                $postDownVote = $post["POST_DOWNVOTE_COUNT"];
                $comment_count = countComment($postid);
               ?>
             <div class="boxborder" >
              <p style="font-size: 14px;" >Title : <?php echo $post_title ?> | by : @<?php echo $userid ?></p>
              <p style="font-size: 14px;" >Upvote : <?php echo $postUpvote ?> | Downvote : @<?php echo $postDownVote ?></p>
              <p><?php echo $post_content ?></p>
              <img src="/public/merdeka1.jpg" alt="Website name" style="width:50%;"><br>
              <a href="../feedModule/comment.php?forumid=<?php echo $postForumID; ?>&postid=<?php echo $postid ?>" style="font-size: 14px;"> <button><?php echo $comment_count ?> comments</button></a>

              </div>
        <?php } ?>
        </div>  
    </div>
    <div class="column right3">
    <img src=         <?php 
        
        include 'database.php';
        $id = $_SESSION['ID'] ;

        $sql = "SELECT USER_FORUM_IMAGE FROM USER_FORUM WHERE USER_FORUM_ID = '$id'"; 

        $result = mysqli_query($conn,$sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            echo "images/";
            if(empty($row["USER_FORUM_IMAGE"]))
            {
                echo "defaultpic.jpg";
            }
            echo $row["USER_FORUM_IMAGE"];
        }
        
        
        
        
        ?>
        
        alt="profile picture" style="width:12em;margin-left:19.5%;">
        <h2 style="margin-top:0;text-align:center;">
        <?php 
        
        include 'database.php';
        $id = $_SESSION['ID'] ;

        $sql = "SELECT USER_FORUM_NAME FROM USER_FORUM WHERE USER_FORUM_ID = '$id'"; 

        $result = mysqli_query($conn,$sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["USER_FORUM_NAME"];
          }
        
        
        
        
        ?></h2>
        <p style="margin-top:-1em;text-align:center;">@        
        <?php 
        
        include 'database.php';
        $id = $_SESSION['ID'] ;

        $sql = "SELECT USER_FORUM_ID FROM USER_FORUM WHERE USER_FORUM_ID = '$id'"; 

        $result = mysqli_query($conn,$sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["USER_FORUM_ID"];
          }
        
        
        
        
        ?> </p>
        <ul class="ulprof">
            <li class="liprof"><a href="profile.php">Profile</a></li>
            <li class="liprof"><a href="updateprofile.php">Update Profile</a></li>
            <li class="liprof"><a href="updatePic.php">Edit Picture</a></li>
            <li class="liactive">Post</li>
            <li class="liprof"><a href="upVote.php">Upvote</a></li>
        </ul>
        
    </div>
</div>



<div class = "loginbox" style="height:7em;padding:3em;padding-top:2em;text-align:center;background-color:#283061;">
    Copyright OPnion. All rights reserved  
    @2021 Online Generated Content Web Forum System
</div>
 
</body>

</html>