<?php
   include("connect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($conn,$_POST['pmail']);
      $password = mysqli_real_escape_string($conn,$_POST['ppass']); 
      
      $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) 
      {
         if (is_array($row))
         {
            $_SESSION["username"]= $row['first_name'];
            $_SESSION["password"]= $row['password'];
            $_SESSION["client_id"]= $row['user_id'];
            header("refresh:0; url= ../booking.php");
            echo'<script>alert("Welcome back")</script>';
         }
      }
      else 
      {
         echo'<script>alert("Incorrect credentials")</script>';
         header("refresh:0; url= ../login.php");
      }
   }
?>