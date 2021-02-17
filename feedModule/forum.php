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
            <li><a href="home.php">Home</a></li>
            <li><a href="/profileModule/profile.php">Profile</a></li>
            <li style="float:right"><a href="/logout.php">Log Out</a></li>

        </ul>
    </div>
</div>
<div class="row">
    <div class="column left3">
    <h2>FORUM TYPE : POLITIC</h2>
    <h3>About : You can discuss on all politics on all over the world.</h3>
        <!-- create post -->
        <div style="background-color: rgb(220, 237, 255);padding-left:2em;padding-right:4em;border: 3px solid #ccc;padding:1em;margin:2em;margin-right:4em;">
            <img src="/public/postsymbol.png" alt="post" style="width:3em;">
            <a href="/discussionModule/createPost.php" ><input style="float:right;" type="text" placeholder="Create Post" name="create" required></a>
        </div>
        <!-- posting -->
        <div class="boxborder" >
            <p style="font-size: 14px;" >Title : Hari Malaysia | by : @HazwaniSalleh</p>
            <p>
                31 Ogos 1957 tanggal Kemerdekaan Malaysia!! Marilah kita meraikan
                nya dengan sebaik mungkin. Kibarkan Bendera Malaysia di semua tempat.
                Tak kira di mana anda berada. Di rumah atau di luar sekalipun. Setuju kah anda
                dengan saya?
                </p>
            <img src="/public/merdeka1.jpg" alt="Website name" style="width:50%;"><br>
            <a href="comment.php"style="font-size: 14px;"> <button>0 comments</button></a>
            <button>Upvote</button>
            <button>Downvote</button>
            <a href="#"style="font-size: 14px;float:right;"> <button>Report this post</button></a>
        </div>
        <div class="boxborder" >
            <p style="font-size: 14px;" >Title : Hari Malaysia | by : @AmirulIman</p>
            <p>
                31 Ogos 1957 tanggal Kemerdekaan Malaysia!! Marilah kita meraikan
                nya dengan sebaik mungkin. Kibarkan Bendera Malaysia di semua tempat.
                Tak kira di mana anda berada. Di rumah atau di luar sekalipun. Setuju kah anda
                dengan saya?
                </p>
            <img src="/public/merdeka1.jpg" alt="Website name" style="width:50%;"><br>
            <a href="#"style="font-size: 14px;"> <button>0 comments</button></a>
            <button>2 Upvote</button>
            <button>3 Downvote</button>
            <a href="#"style="font-size: 14px;float:right;"> <button>Report this post</button></a>
        </div>
        <div class="boxborder" >
            <p style="font-size: 14px;" >Title : Hari Malaysia | by : @WaliyIsmail</p>
            <p>
                31 Ogos 1957 tanggal Kemerdekaan Malaysia!! Marilah kita meraikan
                nya dengan sebaik mungkin. Kibarkan Bendera Malaysia di semua tempat.
                Tak kira di mana anda berada. Di rumah atau di luar sekalipun. Setuju kah anda
                dengan saya?
                </p>
            <img src="/public/merdeka1.jpg" alt="Website name" style="width:50%;"><br>
            <a href="#"style="font-size: 14px;"> <button>0 comments</button></a>
            <button>Upvote</button>
            <button>Downvote</button>
            <a href="#"style="font-size: 14px;float:right;"> <button>Report this post</button></a>
        </div>
        <br>




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
