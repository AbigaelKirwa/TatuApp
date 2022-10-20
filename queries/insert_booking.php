<!-- session starts here, also there is including of relevant files -->
<?php
session_start();
include_once ("connect.php");

if (!isset($_SESSION['username']))
{
    echo'<script>alert("Log in first")</script>';
    header("location: login.php");
}

if (isset($_GET['id'])){
    $fare_id = $_GET['id'];
    $sql = " SELECT * FROM `fare` WHERE `fare_id`= $fare_id";
    $result = $conn -> query($sql);
    if($result -> num_rows > 0 ){
        while($row = $result -> fetch_assoc()){
        $fare_id = $row['fare_id'];
        $pickup_stage_name = $row['pickup_stage_name'];
        $dropoff_stage_name = $row['dropoff_stage_name'];
        $fare_amount = $row['fare_amount'];
        $bus_name = $row['bus_name'];
        $route_name = $row['route_name'];
    }
    $sql= "INSERT INTO `bookings`(route_name,pickup_stage,dropoff_stage,fare_amount,bus_name,user_id) VALUES('$route_name','$pickup_stage_name', '$dropoff_stage_name', '$fare_amount', '$bus_name', '".$_SESSION["client_id"]."')";
    $result = $conn -> query($sql);

    if($result == TRUE){

    header("refresh:0; url= http://localhost/TatuApp/Daraja-API/daraja-tutorial-master/index.php?id=".$fare_id);

    }
    }

}
?>
