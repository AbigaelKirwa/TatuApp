<?php


if($_SERVER["REQUEST_METHOD"] == 'POST'){

    include_once ("connect.php");

//create database query
$sql_create= "CREATE DATABASE matatudb";

//create table
$sql_table = "CREATE TABLE users(
    `user_id` INT(20) AUTO_INCREMENT PRIMARY KEY,
    `firstname` VARCHAR(100) NOT NULL,
    `lastname` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `confirm-password` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `role` VARCHAR(20) NOT NULL
)";


$first_name= $_POST["fname"];
$last_name= $_POST["lname"];
$password= $_POST["pass"];
$confirm_password= $_POST["cpass"];
$email= $_POST["mail"];

$sql = "select * from users where email = '$email'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

if ($num == 0){

if($password == $confirm_password){

    $sql_insert = "INSERT INTO users(`first_name`, `last_name`, `password`, `confirm_password`, `email`, `role`) VALUES ('$first_name','$last_name','$password','$confirm_password', '$email', 'passenger')"; 
    
    if($conn -> query($sql_insert) === TRUE)
    {
        echo '<script>alert("Succesful registration <br> <hl> WELCOME</h1>)</script>"';
        header("Location: login.php");
    }
}
else{
    header("refresh:0; url= register.php");
    echo'<script>alert("Passwords did not match. Check to ensure the passwords Match")</script>';
    header("Location: register.php");
}
}
if ($num > 0){
    echo'<script>alert("Email already taken")</script>';
    header("refresh:0; url= signup.php");
}

}

?>