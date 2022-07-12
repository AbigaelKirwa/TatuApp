<?php
require_once("queries/connect.php");
include_once ("queries/admin_count.php");

if (isset($_POST['insert_fare']))
{

    $sql= "INSERT INTO fare(pickup_stage_id,pickup_stage_name,dropoff_stage_id,dropoff_stage_name,fare_amount) VALUES('".$_POST["pickup_id"]."', '".$_POST["pickup_name"]."', '".$_POST["dropoff_id"]."','".$_POST["dropoff_name"]."','".$_POST["fare_amount"]."')";
    $result = $conn -> query($sql);
    if($result == TRUE){
    echo "Record inserted successfully";
    header("refresh:0; url= admin_fare.php");
    }
    else
    {
        echo "Error:" . $sql . "<br>" . $conn -> error;
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
                    <form action="insert_fare.php" method = "POST" enctype="multipart/form-data">
                        <tr>
                            <th>Pickup id</th>
                            <th>Pickup name</th>
                            <th>Dropoff id</th>
                            <th>Dropoff name</th>
                            <th>fare_amount</th>
                        </tr>
                        <td><input type="number" name="pickup_id" required="true" style="width:130px" min="1"></td>
                        <td><input type="text" name="pickup_name"  required ="true" style="width:130px"></td>
                        <td><input type="number" name="dropoff_id"  required ="true" style="width:130px" min="1"></td>
                        <td><input type="text" name="dropoff_name" required ="true" style="width:130px"></td>
                        <td><input type="number" name="fare_amount" required ="true" style="width:130px" min="1"></td>
                        <td><button class="btn btn-success" type="submit" name="insert_fare" value="save">Insert</button></td>
                    </form>
                </div>
            </div>
        </div>
    </div>          
</body>
</html>