<?php
   include("connect.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['pass']); 
      
      $sql = "SELECT * FROM users WHERE email = '$email' AND `password` = '$password' AND `role` ='admin' ";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) 
      {
         if (is_array($row))
         {
            $_SESSION["email"]= $row['email'];
            header("refresh:0; url= ../admin.php");
            echo'<script>alert("Welcome back")</script>';
         }
      }
      else 
      {
         echo'<script>alert("Incorrect credentials")</script>';
         header("location: ../admin_login.php");
      }
   }
?>