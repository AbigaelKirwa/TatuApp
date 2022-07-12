<?php

    include_once("connect.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM `route` WHERE route_id = $id";
        $result = mysqli_query($conn, $query);
        if($result == TRUE){
            echo'<script>alert("Record deleted succesfully")</script>';
            header("refresh:0; url= ../admin_route.php");
        }
        else
        {
            echo "Error:" . $sql . "<br>" . $conn -> error;
        }
    }
?>