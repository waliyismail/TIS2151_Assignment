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
            
            <li style="float:right"><a href="#contact">Log Out</a></li>
          
        </ul>
    </div>
</div>


<div class="row">
    <div class="column left3">
    <h2>Create Forum</h2>
    <div class="boxborder">
        <form action="/action_page.php" method="post">
            
                    <label for="userid"><b>Forum Title</b></label><br>
                    <input style="width:30em;" type="text" placeholder="Enter User ID" name="userid" required>
                    <br>

                    
                    <label for="about"><b>Forum About</b></label><br>
                    <textarea>About...</textarea>
                    <button class="button"type="submit"style="width:13em;">Create Forum</button>
        </form> 
        </div>
    </div>
    <div class="column right3">
        
        <h2 style="margin-top:0;text-align:center;">ADMIN</h2>
        <p style="margin-top:-1em;text-align:center;">@admin</p>
        <h3 style="text-align:center;">List of All Forum</h3>
        <ul class="ulprof">
            <li class="liprof"><a href="#">Politic</a></li>
            <li class="liprof"><a href="#">Hardware</a></li>
            <li class="liprof"><a href="#">Gaming</a></li>
            <li class="liprof"><a href="#">Upvote</a></li>
        </ul>
       
        
    </div>
</div>



<div class = "loginboxx" style="height:7em;padding:3em;padding-top:2em;text-align:center;background-color:#283061;">
    Copyright OPnion. All rights reserved  
    @2021 Online Generated Content Web Forum System
</div>
 
</body>

</html>