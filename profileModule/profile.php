
<?php 
    include('signinProcess.php');
?>

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
            <li><a href="/feedModule/home.php">Home</a></li>
            <li><a class="active">Profile</a></li>
            
            <li style="float:right"><a href="/logout.php">Log Out</a></li>
      
        </ul>
    </div>
</div>


<div class="row">
    <div class="column left3">
    <h2>Your Profile</h2>
        <div class="boxborder">
            <table>
                <tr>
                    <th>User Id </th>
                    <td>        
                    <?php 
        
                     include 'database.php';
                     $id = $_SESSION['ID'] ;

                    $sql = "SELECT USER_FORUM_ID FROM USER_FORUM WHERE USER_FORUM_ID = $id"; 

        $result = mysqli_query($conn,$sql);
        
        echo $result; 
        
        
        
        ?></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>        <?php 
        
        include 'database.php';
        $id = $_SESSION['ID'] ;

        $sql = "SELECT USER_FORUM_NAME FROM USER_FORUM WHERE USER_FORUM_ID = $id"; 

        $result = mysqli_query($conn,$sql);
        
        echo $result; 
        
        
        
        ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>        <?php 
        
        include 'database.php';
        $id = $_SESSION['ID'] ;

        $sql = "SELECT USER_FORUM_EMAIL FROM USER_FORUM WHERE USER_FORUM_ID = $id"; 

        $result = mysqli_query($conn,$sql);
        
        echo $result; 
        
        
        
        ?></td>
                </tr>
                <tr>
                    <th>About</th>
                    <td></td>        <?php 
        
        include 'database.php';
        $id = $_SESSION['ID'] ;

        $sql = "SELECT USER_FORUM_ABOUT FROM USER_FORUM WHERE USER_FORUM_ID = $id"; 

        $result = mysqli_query($conn,$sql);
        
        echo $result; 
        
        
        
        ?></td>
                </tr>
            </table>
        </div>  
    </div>
    <div class="column right3">
        <img src=         <?php 
        
        include 'database.php';
        $id = $_SESSION['ID'] ;

        $sql = "SELECT USER_FORUM_IMAGE FROM USER_FORUM WHERE USER_FORUM_ID = $id"; 

        $result = mysqli_query($conn,$sql);
        
        echo $result; 
        
        
        
        ?>
        
        alt="profile picture" style="width:12em;margin-left:19.5%;">
        <h2 style="margin-top:0;text-align:center;">
        <?php 
        
        include 'database.php';
        $id = $_SESSION['ID'] ;

        $sql = "SELECT USER_FORUM_NAME FROM USER_FORUM WHERE USER_FORUM_ID = $id"; 

        $result = mysqli_query($conn,$sql);
        
        echo $result; 
        
        
        
        ?></h2>
        <p style="margin-top:-1em;text-align:center;">@        
        <?php 
        
        include 'database.php';
        $id = $_SESSION['ID'] ;

        $sql = "SELECT USER_FORUM_ID FROM USER_FORUM WHERE USER_FORUM_ID = $id"; 

        $result = mysqli_query($conn,$sql);
        
        echo $result; 
        
        
        
        ?> </p>
       
        <ul class="ulprof">
            <li class="liactive">Profile</li>
            <li class="liprof"><a href="updateprofile.php">Update</a></li>
            <li class="liprof"><a href="viewPost.php">Post</a></li>
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