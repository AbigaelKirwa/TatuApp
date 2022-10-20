<?php

include_once ("connect.php");

//this is for fetching id of a route
include("connect.php");
$query1 ="SELECT route_id FROM `route`";
$result = $conn->query($query1);
if($result->num_rows> 0){
    $routeid= mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//this is for fetching name of a route
include("connect.php");
$query2 ="SELECT route_name FROM `route`";
$result = $conn->query($query2);
if($result->num_rows> 0){
    $routename= mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//this is for fetching id of stage
include("connect.php");
$query3 ="SELECT stage_id FROM `stage`";
$result = $conn->query($query3);
if($result->num_rows> 0){
    $stageid= mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//this is for fetching name of stage
include("connect.php");
$query4 ="SELECT stage_name FROM `stage`";
$result = $conn->query($query4);
if($result->num_rows> 0){
    $stagename= mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//this is for fetching id of bus
include("connect.php");
$query5 ="SELECT bus_id FROM `bus`";
$result = $conn->query($query5);
if($result->num_rows> 0){
    $busid= mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//this is for fetching name of bus
include("connect.php");
$query6 ="SELECT bus_name FROM `bus`";
$result = $conn->query($query6);
if($result->num_rows> 0){
    $busname= mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//this is for fetching id of users
include("connect.php");
$query7 ="SELECT user_id FROM `users`";
$result = $conn->query($query7);
if($result->num_rows> 0){
    $userid= mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>