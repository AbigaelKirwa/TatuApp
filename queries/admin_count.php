<?php
include_once ("connect.php");

$sql = "SELECT * from users";

if ($result = mysqli_query($conn, $sql)) {

    $usersrowcount = mysqli_num_rows( $result );
    
}

$sql1 = "SELECT * from booking";

if ($result = mysqli_query($conn, $sql1)) {

    $bookingrowcount = mysqli_num_rows( $result );
    
}

$sql1 = "SELECT * from payment";

if ($result = mysqli_query($conn, $sql1)) {

    $paymentrowcount = mysqli_num_rows( $result );
    
}

?>