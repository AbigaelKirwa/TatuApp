<?php 

    include("connect.php");

    $query ="SELECT fare_amount FROM fare WHERE stage_name= '";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>