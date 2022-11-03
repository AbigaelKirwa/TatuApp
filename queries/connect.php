<?php
//create a connection
//$conn = new mysqli("localhost", "root", "", "matatudb",3307);

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

//check connection
if($conn -> connect_error)
{
    die("Not connected".$conn -> connect_error);
}
//create database query
$sql= "CREATE DATABASE heroku_febd03df904eabb";
$conn -> query($sql)
?>
