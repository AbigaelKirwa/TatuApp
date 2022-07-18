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
        <script src="landing.js"></script>
        <link rel="stylesheet" href="booking.css?v=<?php echo time(); ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Booking</title>
    </head>
    <body>
    <div class="container">
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <img src="images/logo3.png" alt="">
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
                            <li> <a href="logout.php">Logout</a> </li>
                            </ul>
                        </label>
                    </li>
                </ul>
            </nav>
            <?php
                echo "<div class='html_session'><h1>Welcome, " .$_SESSION['username'] ." 😁</h1></div>";
            ?>
            <h1>Please Select Your Route</h1>

            <a href="stagestable.php" class="button" onclick="alert('Waiyaki Way Stages')">Waiyaki Way</button></a>
            <a href="#" class="button" onclick="alert('Langata Road Stages')">Langata Road</button></a>
            <a href="#" class="button" onclick="alert('Ngong Road Stages')">Ngong Road</button></a>
            <a href="#" class="button" onclick="alert('Thika Road Stages')">Thika Road</button></a>
            <a href="#" class="button" onclick="alert('Mombasa Road Stages')">Mombasa Road</button></a>





</body>