<?php 

    include("connect.php");

    $query ="SELECT stage_name FROM stage";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>