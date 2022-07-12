<?php 
include "queries/connect.php";
include_once ("queries/admin_count.php");

if(isset($_POST['update_user'])){
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email= $_POST['mail'];
    $password= $_POST['pass'];
    $confirm_password = $_POST['cpass'];
    $role = $_POST['role'];

    $sql =  "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`password`='$password' ,`confirm_password`='$confirm_password' WHERE `user_id`='$user_id'";
    $result = $conn -> query($sql);
    if($result == TRUE){
        header("Location: admin_user.php");
        echo '<script>alert("Record succesfully updated")</script>"';
    }else{
        echo "Error:" . $sql . "<br>" . $conn -> error;
    }
}

if (isset($_GET['id'])){
    $user_id = $_GET['id'];
    $sql = " SELECT * FROM `users` WHERE `user_id`= $user_id";
    $result = $conn -> query($sql);
    if($result -> num_rows > 0 ){
        while($row = $result -> fetch_assoc()){
            $user_id = $row['user_id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $password = $row['password'];
            $confirm_password = $row['confirm_password'];
            $role = $row['role'];
        }
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
    <title>Update user</title>
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
                <form action="update_user.php" method="post">
                        <tr>
                            <th>User id</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>email</th>
                            <th>password</th>
                            <th>confirm pass</th>
                            <th>role</th>
                            <th>update</th>
                        </tr>
                        <td><input type="text" name="user_id" required="true"  style="width: 100px;" value="<?php echo $user_id;?>"></td>
                        <td><input type="text" name="first_name" required="true"  style="width: 100px;" value="<?php echo $first_name;?>"></td>
                        <td><input type="text" name="last_name"  required ="true" style="width: 100px;" value="<?php echo $last_name;?>"></td>
                        <td><input type="email" name="mail"  required ="true" style="width: 100px;" value="<?php echo $email;?>"></td>
                        <td><input type="password" name="pass" required ="true" style="width: 100px;" value="<?php echo $password;?>"></td>
                        <td><input type="password" name="cpass" required ="true" style="width: 100px;" value="<?php echo $confirm_password;?>"></td>
                        <td><input type="text" name="role" required ="true" style="width: 100px;" value="<?php echo $role;?>"></td>
                        <td><button class="btn btn-success" type="submit" name="update_user" value="save">Update</button></td>

                    </table>
                </form>
                </div>

            </div>
        </div>
    </body>
</html>
