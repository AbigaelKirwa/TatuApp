<?php 
include "queries/connect.php";
include_once ("queries/admin_count.php");

if(isset($_POST['update_route'])){
    $route_id = $_POST['route_id'];
    $route_name = $_POST['route_name'];
    $route_number= $_POST['route_number'];

    $sql =  "UPDATE `route` SET `route_id`='$route_id',`route_name`='$route_name',`route_number`='$route_number' WHERE `route_id`='$route_id'";
    $result = $conn -> query($sql);
    if($result == TRUE){
        echo '<script>alert("Record succesfully updated")</script>"';
        header("Location: admin_route.php");
    }else{
        echo "Error:" . $sql . "<br>" . $conn -> error;
    }
}

if (isset($_GET['id'])){
    $route_id = $_GET['id'];
    $sql = " SELECT * FROM `route` WHERE `route_id`= $route_id";
    $result = $conn -> query($sql);
    if($result -> num_rows > 0 ){
        while($row = $result -> fetch_assoc()){
            $route_id = $row['route_id'];
            $route_name = $row['route_name'];
            $route_number= $row['route_number'];
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
                <form action="" method="post">
                        <tr>
                            <th>route id</th>
                            <th>route name</th>
                            <th>route number</th>
                            <th>update</th>
                        </tr>
                        <tbody>
                            <td><input type="number" name="route_id" min="1" value="<?php echo $route_id;?>"></td>
                            <td><input type="text" name="route_name" value="<?php echo $route_name;?>"></td>
                            <td><input type="number" name="route_number" min="1" value="<?php echo $route_number;?>"></td>
                            <td><button class="btn btn-success" type="submit" name="update_route">Update</button></td>
                        </tbody>

                    </table>
                </form>
                </div>

            </div>
        </div>
    </body>
</html>

    <?php    
     }
     else{
        header('Location: tatuapp/admin.php');
    }
}
?>