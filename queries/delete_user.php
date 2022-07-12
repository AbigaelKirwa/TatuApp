<?php

    include_once("connect.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM users WHERE user_id = $id";
        $result = mysqli_query($conn, $query);
        if($result == TRUE){
            echo'<script>alert("Record deleted succesfully")</script>';
            header("refresh:0; url= ../admin_user.php");
        }
        else
        {
            echo "Error:" . $sql . "<br>" . $conn -> error;
        }
    }
?>