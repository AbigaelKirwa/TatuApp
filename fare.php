<?php
    include 'queries/connect.php';
    
    $start = $_POST['start'];
    $stop = $_POST['stop'];
    $query ="SELECT " . $stop . " FROM stages WHERE start = '" . $start . "'";
    $result = $conn->query($query);
    if($result->num_rows>0){
        $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    $fare = $options[0][$stop];
    echo $fare;
?>