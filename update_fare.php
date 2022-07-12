<?php 
include "queries/connect.php";
include_once ("queries/admin_count.php");

if(isset($_POST['update_fare'])){
    $fare_id = $_POST['fare_id'];
    $pickup_id = $_POST['pickup_id'];
    $pickup_name= $_POST['pickup_name'];
    $dropoff_id = $_POST['dropoff_id'];
    $dropoff_name = $_POST['dropoff_name'];
    $fare_amount = $_POST['fare_amount'];

    $sql =  "UPDATE `fare` SET `pickup_stage_id`='$pickup_id',`pickup_stage_name`='$pickup_name',`dropoff_stage_id`='$dropoff_id',`dropoff_stage_name`='$dropoff_name',`fare_amount`='$fare_amount' WHERE `fare_id`='$fare_id'";
    $result = $conn -> query($sql);
    if($result == TRUE){
        echo '<script>alert("Record succesfully updated")</script>"';
        header("Location: admin_fare.php");
    }else{
        echo "Error:" . $sql . "<br>" . $conn -> error;
    }
}

if (isset($_GET['id'])){
    $fare_id = $_GET['id'];
    $sql = " SELECT * FROM `fare` WHERE `fare_id`= $fare_id";
    $result = $conn -> query($sql);
    if($result -> num_rows > 0 ){
        while($row = $result -> fetch_assoc()){
            $fare_id = $row['fare_id'];
            $pickup_id = $row['pickup_stage_id'];
            $pickup_name= $row['pickup_stage_name'];
            $dropoff_id = $row['dropoff_stage_id'];
            $dropoff_name = $row['dropoff_stage_name'];
            $fare_amount = $row['fare_amount'];
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
                            <th>fare id</th>
                            <th>Pickup id</th>
                            <th>Pickup name</th>
                            <th>Dropoff id</th>
                            <th>Dropoff name</th>
                            <th>fare_amount</th>
                            <th>update</th>
                        </tr>
                        <tbody>
                            <td><input type="number" name="fare_id" min="1" value="<?php echo $fare_id;?>" style="width:100px"></td>
                            <td><input type="number" name="pickup_id" min="1" value="<?php echo $pickup_id;?>" style="width:100px"></td>
                            <td><input type="text" name="pickup_name" value="<?php echo $pickup_name;?>" style="width:100px"></td>
                            <td><input type="number" name="dropoff_id" min="1" value="<?php echo $dropoff_id;?>" style="width:100px"></td>
                            <td><input type="text" name="dropoff_name" value="<?php echo $dropoff_name;?>" style="width:100px"></td>
                            <td><input type="number" name="fare_amount" min="1"value="<?php echo $fare_amount;?>" style="width:100px"></td>
                            <td><button class="btn btn-success" type="submit" name="update_fare">Update</button></td>
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