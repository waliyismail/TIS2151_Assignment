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
            <li><a class="active">Forum</a></li>
            <li><a href="adminReport.php">User Report</a></li>
            <li><a href="adminManage.php">Account Management</a></li>
            <form>
            <li style="float:right"><a href="/logout.php">Log Out</a></li>
            </form>
        </ul>
    </div>
</div>
<?php
  include "createForum.php";

?>

<div class="row">
    <div class="column left3">
    <h2>Create Forum</h2>
    <div class="boxborder">
        <form action="createForum.php" method="post">

                    <label for="forumid"><b>Forum Title</b></label><br>
                    <input style="width:30em;" type="text" placeholder="Enter Forum Title" name="forum_name" required>
                    <br>


                    <label for="about"><b>Forum About</b></label><br>
                    <textarea name="forum_about" placeholder="About..."></textarea>
                    <button class="button" type="submit" name="create_forum" style="width:13em;">Create Forum</button>
        </form>
        </div>
    </div>
    <div class="column right3">

        <h2 style="margin-top:0;text-align:center;">ADMIN</h2>
        <p style="margin-top:-1em;text-align:center;">@<?php echo $GLOBALS['currentadminid'];?></p>
        <h3 style="text-align:center;">List of All Forum</h3>
        <!-- get forum from database -->
        <?php
        $forum_list = getForum();
        if(empty($forum_list)){
          echo "<p> no forum yet.. </p>";
        }else {        ?>
        <ul class="ulprof">
            <?php foreach ($forum_list as $forum) {
                // echo var_dump($forum_list);
                // echo "           "?>

              <li class="liprof"><a><?php echo $forum["1"]; ?></a></li>
            <?php } ?>

        </ul>
      <?php } ?>


    </div>
</div>



<div class = "loginboxx" style="height:7em;padding:3em;padding-top:2em;text-align:center;background-color:#283061;">
    Copyright OPnion. All rights reserved
    @2021 Online Generated Content Web Forum System
</div>

</body>

</html>
