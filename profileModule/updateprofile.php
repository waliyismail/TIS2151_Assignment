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
            <li><a class="active" >Profile</a></li>
            
            <li style="float:right"><a href="#contact">Log Out</a></li>
        
        </ul>
    </div>
</div>


<div class="row">
    <div class="column left3" style="background-color:white;">
        <h2>Update Profile</h2>
        <form action="/action_page.php" method="post">
            <div class="container">
                    <label for="userid"><b>New User ID</b></label><br>
                    <input style="width:30em;" type="text" placeholder="Enter User ID" name="userid" required>
                    <br>

                    <label for="pass"><b>New Password</b></label><br>
                    <input style="width:30em;" type="password" placeholder="Enter Password" name="pass" required>
                    <br>

                    <label for="username"><b>New Username</b></label><br>
                    <input style="width:30em;" type="text" placeholder="Enter Username" name="username" required>
                    <br>

                    <label for="email"><b>New Email</b></label><br>
                    <input style="width:30em;" type="email" placeholder="Enter Email" name="email" required>
                    <br>

                    <label for="fullname"><b>Full Name</b></label><br>
                    <input style="width:30em;" type="text" placeholder="Enter Fullname" name="fullname" required>
                    <br>

                    <label for="hometown"><b>Hometown</b></label><br>
                    <input style="width:30em;" type="hometown" placeholder="Enter hometown" name="hometown" required>
                    <br>

                    <label for="hometown"><b>Select a profile picture:</b></label><br>
                    <input type="file" id="myFile" size="50">
                    <br>
                    
                    <label for="about"><b>About</b></label><br>
                    <textarea>About...</textarea>
                    <button type="submit"style="width:13em;">Update Profile</button>
                    
                    
            </div>
        </form>
    </div>
    <div class="column right3">
        <img src="/public/profilepic.png" alt="profile picture" style="width:12em;margin-left:19.5%;">
        <h2 style="margin-top:0;text-align:center;">HazwaniSalleh </h2>
        <p style="margin-top:-1em;text-align:center;">@HazwaniSalleh </p>
       
        <ul class="ulprof">
            <li class="liprof"><a href="profile.php">Profile</a></li>
            <li class="liactive">Update</li>
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