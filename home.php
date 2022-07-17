<?php
session_start();
include_once ("queries/connect.php");
include_once ("queries/fetch_starting.php");
include_once ("queries/fetch_destination.php");
if (!isset($_SESSION['username']))
{
    echo'<script>alert("Log in first")</script>';
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home page</title>
</head>
<body>
    <div class="logo">
        <img src="images/logo-green.png" alt="">
    </div>
    <!--Humberger Menu-->
    <label>
        <input type="checkbox">
        <span class="menu"> <span class="hamburger"></span> </span>
        <ul>
        <li> <a href="landingpage.php">Home</a> </li>
        <li> <a href="#">About</a> </li>
        <li> <a href="#">Contact</a> </li>
        <li> <a href="logout.php">Logout</a></li>
        </ul>
    </label>
        <?php
             echo "<div class='html_session'><h1>Welcome, " .$_SESSION['username'] ." 😁</h1></div>";
        ?>
    <div class="heading">
        <h1>Booking Details</h1>  
    </div>
    <div class="row">
        <div class="col-4">
        <label for="start">start point</label>
        <select class="form-select" aria-label="Default select example" name="stage_name">
            <?php 
                foreach ($options as $option) {
                    ?>
                    <option><?php echo $option['stage_name']; ?></option>
                    <?php 
                }
            ?>
        </select>
        </div>
        <div class="col-4">
        <label for="destination">destination point</label>
        <select class="form-select" aria-label="Default select example" name="stage_name">
            <?php 
                foreach ($options as $option) {
                    ?>
                    <option><?php echo $option['stage_name']; ?></option>
                    <?php 
                }
            ?>
        </select>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
        <label for="price">fare</label>
        <div class="price">ksh.80</div>
        </div>
        <div class="col-4">
        <button class="available" type="submit">see available buses</button>
        </div>
    </div>
    <div class="heading-2">
        <h1>Available Buses</h1>  
    </div>
    <div class="row" id='row-for-buses'>
        <div class="col">
            <img src="images/orangebus2.png" alt="">
            <p class="bus-description"><b>city bus</b></p>
        </div>
        <div class="col">
            <img src="images/bluebus2.png" alt="">
            <p class="bus-description"><b>latema</b></p>
        </div>
        <div class="col">
            <img src="images/orangebus2.png" alt="">
            <p class="bus-description"><b>shuttle</b></p>
        </div>
    </div>
    <div class="row" id='row-for-buses'>
        <div class="col">
            <img src="images/orangebus2.png" alt="">
            <p class="bus-description"><b>embassava</b></p>
        </div>
        <div class="col">
            <img src="images/bluebus2.png" alt="">
            <p class="bus-description"><b>s-metro</b></p>
        </div>
        <div class="col">
            <img src="images/orangebus2.png" alt="">
            <p class="bus-description"><b>express</b></p>
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