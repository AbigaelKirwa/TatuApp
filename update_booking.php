<?php 
include "queries/connect.php";
include_once ("queries/admin_count.php");

if(isset($_POST['update_booking'])){
    $booking_id = $_POST['booking_id'];
    $route_name = $_POST['route_name'];
    $pickup_stage= $_POST['pickup_stage'];
    $dropoff_stage= $_POST['dropoff_stage'];
    $fare_amount= $_POST['fare_amount'];
    $bus_name= $_POST['bus_name'];
    $user_id= $_POST['user_id'];


    $sql =  "UPDATE `bookings` SET `booking_id`='$booking_id',`route_name`='$route_name',`pickup_stage`='$pickup_stage', `dropoff_stage`='$dropoff_stage',`fare_amount`='$fare_amount', `bus_name`='$bus_name',`user_id`='$user_id' WHERE `booking_id`='$booking_id'";
    $result = $conn -> query($sql);
    if($result == TRUE){
        echo '<script>alert("Record succesfully updated")</script>"';
        header("Location: admin_booking.php");
    }else{
        echo "Error:" . $sql . "<br>" . $conn -> error;
    }
}

if (isset($_GET['id'])){
    $booking_id = $_GET['id'];
    $sql = " SELECT * FROM `bookings` WHERE `booking_id`= $booking_id";
    $result = $conn -> query($sql);
    if($result -> num_rows > 0 ){
        while($row = $result -> fetch_assoc()){
            $booking_id = $row['booking_id'];
            $route_name = $row['route_name'];
            $pickup_stage= $row['pickup_stage'];
            $dropoff_stage= $row['dropoff_stage'];
            $fare_amount= $row['fare_amount'];
            $bus_name= $row['bus_name'];
            $user_id= $row['user_id'];
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
    <title>Update booking</title>
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
                <a href="admin_bus.php">
                    <span class="glyphicon glyphicon-bold" style="font-size:30px; color:white;"></span>
                </a><br><br>
                </p>
                </div>
                <div class="item2"><p id="rcorners2"></p></div>
                <div class="item3"><p id="rcorners3">USERS<br><?php echo $usersrowcount; ?></p></div>
                <div class="item4"><p id="rcorners4">BOOKING<br><?php echo $bookingrowcount; ?></p></div>
                <div class="item5"><p id="rcorners5">PAYMENT<br><?php echo $paymentrowcount; ?></p></div>
                <div class="item6"><table id="rcorners6" class="table">      
                <form action="update_booking.php" method="post">
                        <tr>
                            <th>booking id</th>
                            <th>route name</th>
                            <th>pickup stage</th>
                            <th>dropoff stage</th>
                            <th>fare amount</th>
                            <th>bus name</th>
                            <th>user id</th>
                            <th>update</th>
                        </tr>
                        <tbody>
                        <td><input type="number" name="booking_id" value="<?php echo $booking_id;?>" style="width:100px" min="1"></td>
                        <td><input type="text" name="route_name" value="<?php echo $route_name;?>" style="width:100px"></td>
                        <td><input type="text" name="pickup_stage"  value="<?php echo $pickup_stage;?>" style="width:100px"></td>
                        <td><input type="text" name="dropoff_stage" value="<?php echo $dropoff_stage;?>" style="width:100px"></td>
                        <td><input type="number" name="fare_amount" value="<?php echo $fare_amount;?>" style="width:100px" min="1"></td>
                        <td><input type="text" name="bus_name" value="<?php echo $bus_name;?>" style="width:100px"></td>
                        <td><input type="number" name="user_id" value="<?php echo $user_id;?>" style="width:100px" min="1"></td>
                            <td><button class="btn btn-success" type="submit" name="update_booking">Update</button></td>
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

}
?>