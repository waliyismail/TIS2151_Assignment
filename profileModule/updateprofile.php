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
            <li><a href="#Home">Home</a></li>
            <li><a class="active" >Profile</a></li>
            
            <li style="float:right"><a href="#contact">Log Out</a></li>
            <li style="float:right"><a href="#contact">Help Center</a></li>
        </ul>
    </div>
</div>


<div class="row">
    <div class="column left3" style="background-color:white;">
        <h2>Update Profile</h2>
        <div class="container">
                    <label for="uname"><b>User ID</b></label><br>
                    <input style="width:30em;" type="text" placeholder="Enter User ID" name="userid" required>
                    <br>
                    <label for="psw"><b>Password</b></label><br>
                    <input style="width:30em;" type="password" placeholder="Enter Password" name="pass" required>
                    <br>
                    <label for="uname"><b>Username</b></label><br>
                    <input style="width:30em;" type="text" placeholder="Enter Username" name="username" required>
                    <br>
                    <label for="uname"><b>Email</b></label><br>
                    <input style="width:30em;" type="email" placeholder="Enter Email" name="email" required>
                    <br>
                    <button type="submit"style="width:13em;">Update Profile</button>
                </div>
    </div>
    <div class="column right3">
        <img src="/public/profilepic.png" alt="profile picture" style="width:12em;margin-left:19.5%;">
        <h2 style="margin-top:0;text-align:center;">HazwaniSalleh </h2>
        <p style="margin-top:-1em;text-align:center;">@HazwaniSalleh </p>
       
        <ul class="ulprof">
            <li class="liprof"><a href="profile.php">Profile</a></li>
            <li class="liactive">Update</li>
            <li class="liprof"><a href="posts">Post</a></li>
            <li class="liprof"><a href="#comment">Comment</a></li>
            <li class="liprof"><a href="#upvote">Upvote</a></li>
        </ul>
        
    </div>
</div>



<div class = "loginbox" style="height:7em;padding:3em;padding-top:2em;text-align:center;background-color:#283061;">
    Copyright OPnion. All rights reserved  
    @2021 Online Generated Content Web Forum System
</div>
 
</body>

</html>