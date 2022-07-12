<?php
require_once("queries/connect.php");
include_once ("queries/admin_count.php");

if (isset($_POST['insert_user']))
{
    $password= $_POST["pass"];
    $confirm_password= $_POST["cpass"];
    $email= $_POST["mail"];

    $sql = "select * from users where email = '$email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);

    if ($num == 0){

    if($password == $confirm_password){

        $sql_insert= "INSERT INTO users(first_name,last_name,email,`password`,confirm_password, `role`) VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."', '".$_POST["mail"]."','".$_POST["pass"]."','".$_POST["cpass"]."','".$_POST["role"]."')"; 
        
        if($conn -> query($sql_insert) === TRUE)
        {
            echo '<script>alert("Succesful registration <br> <hl> WELCOME</h1>)</script>"';
            header("Location: admin_user.php");
        }
    }
    else{
        echo'<script>alert("Passwords did not match. Check to ensure the passwords Match")</script>';
        header("Location: insert_user.php");
    }
    }
    if ($num > 0){
        echo'<script>alert("Email already taken")</script>';
        header("refresh:0; url= insert_user.php");
    }
    else
    {
        echo'<script>alert("there is an error")</script>';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Upload Stage</title>
</head>
<body>
<div class="container">
        <div class="backshapes">
            <div class="item1"><p id="rcorners1"><br>ADMIN<br><br>
                <a href="admin.php">
                    <span class="glyphicon glyphicon-road" style="font-size:30px; color:white; margin-top:5px"></span>
                </a><br><br>
                <a href="admin_user.php">
                    <span class="glyphicon glyphicon-user" style="font-size:30px; color:white;"></span>
                </a><br><br>
                <a href="admin_payment.php">
                    <span class="glyphicon glyphicon-credit-card" style="font-size:30px; color:white;"></span>
                </a><br><br>
                <a href="admin_fare.php">
                    <span class="glyphicon glyphicon-usd" style="font-size:30px; color:white;"></span>
                </a><br><br>
                <a href="admin_route.php">
                    <span class="glyphicon glyphicon-circle-arrow-right" style="font-size:30px; color:white;"></span>
                </a><br><br>
                <a href="admin_booking.php">
                    <span class="glyphicon glyphicon-book" style="font-size:30px; color:white;"></span>
                </a><br><br>
                </p>
                </div>
                <div class="item2"><p id="rcorners2"></p></div>
                <div class="item3"><p id="rcorners3">USERS<br><?php echo $usersrowcount; ?></p></div>
                <div class="item4"><p id="rcorners4">BOOKING<br><?php echo $bookingrowcount; ?></p></div>
                <div class="item5"><p id="rcorners5">PAYMENT<br><?php echo $paymentrowcount; ?></p></div>
                <div class="item6"><table id="rcorners6" class="table">
                    <form action="insert_user.php" method = "POST" enctype="multipart/form-data">
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>email</th>
                            <th>password</th>
                            <th>confirm pass</th>
                            <th>role</th>
                            <th>insert</th>
                        </tr>
                        <td><input type="text" name="first_name" required="true"  style="width: 100px;"></td>
                        <td><input type="text" name="last_name"  required ="true" style="width: 100px;"></td>
                        <td><input type="email" name="mail"  required ="true" style="width: 100px;"></td>
                        <td><input type="password" name="pass" required ="true" style="width: 100px;"></td>
                        <td><input type="password" name="cpass" required ="true" style="width: 100px;"></td>
                        <td><input type="text" name="role" required ="true" style="width: 100px;"></td>
                        <td><button class="btn btn-success" type="submit" name="insert_user" value="save">Insert</button></td>
                    </form>
                </div>
            </div>
        </div>
    </div>          
</body>
</html>