<!-- session starts here, also there is including of relevant files -->
<?php
session_start();
include_once ("queries/connect.php");
if (!isset($_SESSION['username']))
{
    echo'<script>alert("Log in first")</script>';
    header("location: login.php");
}

if (isset($_POST['insert_booking']))
{
    // this code is what inserts data to bookings table from the input given below
    $sql= "INSERT INTO `bookings`(pickup_stage,dropoff_stage,fare_amount,bus_name,user_id) VALUES('".$_POST["pickup_stage"]."', '".$_POST["dropoff_stage"]."', '".$_POST["fare_amount"]."', '".$_POST["bus_name"]."', '".$_SESSION["client_id"]."')";
    $result = $conn -> query($sql);
    if($result == TRUE){
    header("refresh:0; url= https://morning-basin-87523.herokuapp.com");
    }
    else
    {
        echo "Error:" . $sql . "<br>" . $conn -> error;
    }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
        <li> <a href="#">Book</a> </li>
        <li> <a href="logout.php">Logout</a></li>
        </ul>
    </label>

<!-- this displays the session by displaying the users name -->
    <div class="heading">
        <?php
             echo "<div class='html_session'><h2>Welcome, " .$_SESSION['username'] ." 😁</h2></div>";
        ?>
        <h1>Booking Details</h1>  
    </div>

<!-- this displays the search functionality it calls a function search place that is found at the bottom of this page -->
    <div class="d-flex" role="search">
        <input onkeyup="search_place()" class="form-control me-2" name="search" type="search" id="searchbar" placeholder="Search route" aria-label="Search">
    </div>

<!-- this table displays values from fares table-->
    <div class="item6">
        <table id="rcorners6" class="table">
            <tr>
            <th scope="col">route_name</th>  
            <th scope="col">pickup stage </th>   
            <th scope="col">drop off stage</th>
            <th scope="col">fare amount</th>
            <th scope="col">bus name</th>
            <th scope="col">Book a bus now</th>
            </tr>
            <?php
                $sql_select = "SELECT  * FROM `fare`";
                $results = $conn->query($sql_select);
                $total_rows = mysqli_num_rows($results);

                if($results -> num_rows > 0)
                {
                    $query = "SELECT * FROM `fare`";  
                    $result = mysqli_query($conn, $query);  
                    while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td class="route_name" name="route_name"><?php echo $row['route_name']; ?></td>
                            <td class="pickup" name="pickup_stage"><?php echo $row['pickup_stage_name']; ?></td>
                            <td class="dropoff" name="dropoff_stage"><?php echo $row['dropoff_stage_name']; ?></td>
                            <td class="fare" name="fare_amount"><?php echo $row['fare_amount']; ?></td>
                            <td class="bus" name="bus_name"><?php echo $row['bus_name']; ?></td>
                            <td>
                            <!-- here I am redirecting to insert_booking.php-->
                            <button type="button" class="btn btn-warning" id="editbtn"><a name="insert_booking" href="queries/insert_booking.php?id=<?php echo $row['fare_id']; ?>">Book</a></button>

                            </td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </div>
<!-- this script helps with displaying filtered values throught the search functionalities-->
    <script>
        function search_place() {
            let input = document.getElementById('searchbar').value
            input=input.toLowerCase();
            let x = document.getElementsByClassName('dropoff');
            let a = document.getElementsByClassName('pickup');
            let b = document.getElementsByClassName('bus');
            let c = document.getElementsByClassName('fare');
            let d = document.getElementsByClassName('btn btn-warning');
            let e = document.getElementsByClassName('route_name');
            
            
            for (i = 0; i < x.length,a.lenght,b.length; i++) { 
                if (!e[i].innerHTML.toLowerCase().includes(input)) {
                    x[i].style.display="none";
                    a[i].style.display="none";
                    b[i].style.display="none";
                    c[i].style.display="none";
                    d[i].style.display="none";
                    e[i].style.display="none";
                }
                else {
                    x[i].style.display=""; 
                    a[i].style.display="";
                    b[i].style.display="";     
                    c[i].style.display="";  
                    d[i].style.display="";      
                    e[i].style.display="";        
                }
            }
        }
    </script>
</body>
</html>