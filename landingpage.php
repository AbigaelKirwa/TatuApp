<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="landing.js"></script>
        <link rel="stylesheet" href="css/landingpage.css?v=<?php echo time(); ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>TatuApp</title>
    </head>
    <body>
        <div class="container">
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <img src="images/logo3.png" alt="">
                    </li>
                    <li class="nav-item" id="button1">
                        <a href="signup.php"class="button1">Sign up/in</a>
                    </li>
                    <li class="nav-item">

                        <!--Humberger Menu-->
                        <label>
                            <input type="checkbox">
                            <span class="menu"> <span class="hamburger"></span> </span>
                            <ul>
                            <li> <a href="#">Home</a> </li>
                            <li> <a href="#">About</a> </li>
                            <li> <a href="#">Contact</a> </li>
                            </ul>
                        </label>
                    </li>
                </ul>
            </nav>
            <div class="page1">
                <div class="page-1-img">
                    <img src="images/landingpage3.png" alt="">
                </div>
                <div class="page-1-words">
                    <div class="heading">
                        <h1>Tatu App</h1><br><br>
                    </div>
                    <div class="heading2">
                        <h1>Book a Bus with Us!</h1>
                    </div>
                    <div class="button-one">
                        <a href="login.php"><input class="button" type="button" value="Let’s Book!"></a>
                    </div>  
                </div>
            </div>
            <div class="page-2">
                <h1>About Us</h1>
                <p>
                    Tatu App is a company that offers transport services to<br>
                    residents of Nairobi. Book a bus and pay here all from your 
                    fingertips!
                </p>
                <div class="row">
                    <div class="col" id="col1">
                        <img src="images/vector.png" alt="" class="image-hover-highlight">
                        <p>SAFE</p>
                    </div>
                    <div class="col" id="col2">
                        <img src="images/vector2.png" alt="">
                        <p>EFFICIENT</p>
                    </div>
                    <div class="col" id="col3">
                        <img src="images/vector3.png" alt="">
                        <p>FAST</p>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="footer-copyright">
                    <img src="images/footerbus.png" alt="">
                </div>
                <div class="footer-links">
                    <ul>
                        <li><a href="#"><b>Updates</b></a></li>
                        <li><a href="#">Schedule</a></li>
                        <li><a href="#">Launches</a></li>
                        <li><a href="#">Announcements</a></li>
                    </ul>
                    <ul>
                        <li><a href="#"><b>Offers</b></a></li>
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="#">Coupons</a></li>
                        <li><a href="#">Free stuff</a></li>
                    </ul>
                    <ul>
                        <li><a href="#"><b>Links</b></a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Tools</a></li>
                        <li ><a href="#">Tips</a></li>
                    </ul>
                </div>
            </div>
        </footer>

    </body>
</html>