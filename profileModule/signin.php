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

<div class="row">

    <div class="column left2">

        <div class="loginbox">
            <h1 style="text-align:center;">Welcome to OPnion</h1>

            <form action="/action_page.php" method="post">
                <div class="clearfix">
                    <div class="box" >
                        <h3>Log in</h3>
                    </div>
                    <div class="box" >
                        <h3><a href="signup.php" style="color: rgb(153, 153, 153);text-decoration: none;">Sign up</a></h3>
                    </div>
                </div>
            <hr class="login"style="margin: 0px; width:50%;">
            <hr class="login1"style="margin: 0px; width:50%;">
            <br>
            <div class="container">
                    <label for="uname"><b>User ID</b></label>
                    <input type="text" placeholder="Enter User ID" name="userid" required>
                    <br>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="pass" required>
                    
                    <button type="submit" name = "save">Login</button>
                </div>
            </form>
    
        </div>
    </div>

    <div class="column right2">
        <h2>We Providing You The Best Online Forum Website</h2>
        <div class="slideshow-container">

            <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img src="/public/blog1.jpg" style="width:100%">
              <div class="text">Forum and Discussion</div>
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img src="/public/blog2.jpg" style="width:100%">
              <div class="text">Discuss, Suggest,Answer, Publish</div>
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img src="/public/blog3.jpg" style="width:100%">
              <div class="text">Connect through OPnion</div>
            </div>
            
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
        </div>
            <br>
            
            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span> 
              <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
            
            <script>
            var slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
            </script>

    </div>
</div>

<div class = "loginbox" style="margin-top:10em;height:7em;padding:3em;padding-top:2em;text-align:center;background-color:#283061;">
Copyright OPnion. All rights reserved  <br>
@2021 Online Generated Content Web Forum System
</div>
 
</body>

</html>