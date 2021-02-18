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
  $userReports = getReports();
 ?>
<div class="row">
    <div class="column left3">
    <h2>User Report</h2>

    <?php
    if(mysqli_num_rows($userReports) > 0) {

       while ($report = mysqli_fetch_array($userReports)) {
         $report_id = $report['USER_FORUM_REPORT_ID'];
         $report_content = $report['USER_FORUM_REPORT_CONTENT'];
         $post_id = $report['POST_ID'];
         $reporter_id = $report['USER_FORUM_ID'];
         $reported_post = getPostDetails($post_id);
         ?>
         <div class="boxborder" >
             REPORTED BY : @<?php echo $report_id ?> <br>
             FORUM : POLITICS<br>
             REPORT DETAILS : <?php if(is_null($report_content)) { echo "N/A"; }else { echo $report_content; }?><br>
             <hr>
                 <p style="font-size: 14px;" >Title : <?php echo $post['POST_TITLE'] ?> | by : @<?php echo $post['USER_FORUM_ID'] ?></p>
                 <p><?php echo $post['POST_CONTENT'] ?>                     </p>
                 <?php if(is_null($post['POST_IMAGE'])) {?>
                   <img src="post_images/<?php echo $post["POST_IMAGE"]; ?>" alt="post image" style="width:50%;"><br> <?php } ?>
                 <button class="button"type="submit"style="width:13em;">DELETE</button>
         </div>
             <br>
      <?php  } ?>

    <?php } else
     {
       echo "no reports..";
     }?>

    <div class="boxborder" >
        REPORTED BY : @AmirulIman <br>
        FORUM : POLITICS<br>
        TYPE : POSTING<br>
        <hr>
            <p style="font-size: 14px;" >Title : Hari Malaysia | by : @WaliyIsmail</p>
            <p>
                31 Ogos 1957 tanggal Kemerdekaan Malaysia!! Marilah kita meraikan
                nya dengan sebaik mungkin. Kibarkan Bendera Malaysia di semua tempat.
                Tak kira di mana anda berada. Di rumah atau di luar sekalipun. Setuju kah anda
                dengan saya?
                </p>
            <img src="/public/merdeka1.jpg" alt="Website name" style="width:50%;"><br>
            <button class="button"type="submit"style="width:13em;">DELETE</button>
        </div>
        <br>
        <div class="boxborder">
            Reported by :

        </div>
        <br>
        <div class="boxborder">
            Reported by :

        </div>
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
