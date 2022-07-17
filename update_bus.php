<?php 
include "queries/connect.php";
include_once ("queries/admin_count.php");

if(isset($_POST['update_bus'])){
    $bus_id = $_POST['bus_id'];
    $bus_name = $_POST['bus_name'];
    $number_plate= $_POST['number_plate'];
    $route_id= $_POST['route_id'];
    $bus_image= $_POST['bus_image'];
    $capacity= $_POST['capacity'];


    $sql =  "UPDATE `bus` SET `bus_id`='$bus_id',`bus_name`='$bus_name',`number_plate`='$number_plate', `route_id`='$route_id',`bus_image`='$bus_image', `capacity`='$capacity' WHERE `bus_id`='$bus_id'";
    $result = $conn -> query($sql);
    if($result == TRUE){
        echo '<script>alert("Record succesfully updated")</script>"';
        header("Location: admin_bus.php");
    }else{
        echo "Error:" . $sql . "<br>" . $conn -> error;
    }
}

if (isset($_GET['id'])){
    $bus_id = $_GET['id'];
    $sql = " SELECT * FROM `bus` WHERE `bus_id`= $bus_id";
    $result = $conn -> query($sql);
    if($result -> num_rows > 0 ){
        while($row = $result -> fetch_assoc()){
            $bus_id = $row['bus_id'];
            $bus_name = $row['bus_name'];
            $number_plate= $row['number_plate'];
            $route_id= $row['route_id'];
            $bus_image= $row['bus_image'];
            $capacity= $row['capacity'];
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
                            <th>bus id</th>
                            <th>bus name</th>
                            <th>number plate</th>
                            <th>route id</th>
                            <th>bus image</th>
                            <th>capacity</th>
                            <th>update</th>
                        </tr>
                        <tbody>
                        <td><input type="text" name="bus_id" value="<?php echo $bus_id;?>" style="width:100px"></td>
                        <td><input type="text" name="bus_name" value="<?php echo $bus_name;?>" style="width:100px"></td>
                        <td><input type="text" name="number_plate"  value="<?php echo $number_plate;?>" style="width:100px"></td>
                        <td><input type="number" name="route_id" value="<?php echo $route_id;?>" style="width:100px"></td>
                        <td><input type="text" name="bus_image" value="<?php echo $bus_image;?>" style="width:100px"></td>
                        <td><input type="number" name="capacity" value="<?php echo $capacity;?>" style="width:100px"></td>
                            <td><button class="btn btn-success" type="submit" name="update_bus">Update</button></td>
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