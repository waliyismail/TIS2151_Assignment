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

<div class="loginbox" style="margin-top:6em;">
    <h1 style="text-align:center;">Welcome Admin OPnion</h1>
    <form action="signinProcess.php" method="post">
        <br>
        <div class="container">
            <label for="uname"><b>User ID</b></label>
            <input type="text" placeholder="Enter Admin ID" name="adminid" required>
                <br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" required>
                    
                <button class="button" type="submit" name = "save">Login</button>
        </div>
        
    </form>
    
</div>

<div class = "loginboxx" style="margin-top:9em;height:7em;padding:3em;padding-top:2em;text-align:center;background-color:#283061;">
Copyright OPnion. All rights reserved  <br>
@2021 Online Generated Content Web Forum System <a href="/profileModule/signin.php" style="color:white;text-align:center;">Back to User</a>
</div>
 
</body>

</html>