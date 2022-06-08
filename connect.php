<?php
//create a connection
$conn = new mysqli("localhost", "root", "", "matatudb",3307);

//check connection
if($conn -> connect_error)
{
    die("Not connected".$conn -> connect_error);
}
//create database query
$sql= "CREATE DATABASE MATATUAPP";
$conn -> query($sql)
?>