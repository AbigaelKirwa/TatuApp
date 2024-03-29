<?php
require_once("queries/connect.php");
include_once ("queries/admin_count.php");
include_once ("queries/fetch.php");

if (isset($_POST['insert_fare']))
{

    $sql= "INSERT INTO fare(route_id,route_name,pickup_stage_id,pickup_stage_name,dropoff_stage_id,dropoff_stage_name,fare_amount,bus_id,bus_name) VALUES('".$_POST["route_id"]."','".$_POST["route_name"]."','".$_POST["pickup_id"]."', '".$_POST["pickup_name"]."', '".$_POST["dropoff_id"]."','".$_POST["dropoff_name"]."','".$_POST["fare_amount"]."','".$_POST["bus_id"]."','".$_POST["bus_name"]."')";
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
                <a href="admin_bus.php">
                    <span class="glyphicon glyphicon-bold" style="font-size:30px; color:white;"></span>
                </a><br><br>
                </p>
                </div>
                <div class="item2"><p id="rcorners2"></p></div>
                <div class="item3"><p id="rcorners3">USERS<br><?php echo $usersrowcount; ?></p></div>
                <div class="item4"><p id="rcorners4">BOOKING<br><?php echo $bookingrowcount; ?></p></div>
                <div class="item5"><p id="rcorners5">BUSES<br><?php echo $paymentrowcount; ?></p></div>
                <div class="item6"><table id="rcorners6" class="table">
                    <form action="insert_fare.php" method = "POST" enctype="multipart/form-data">
                        <tr>
                            <th>Route id</th>
                            <th>Route name</th>
                            <th>Pickup id</th>
                            <th>Pickup name</th>
                            <th>Dropoff id</th>
                            <th>Dropoff name</th>
                            <th>fare amount</th>
                            <th>bus id</th>
                            <th>bus name</th>
                        </tr>
                        <td>
                        <select class="form-select" aria-label="Default select example" name="route_id" style="width:50px">
                            <?php 
                                foreach ($routeid as $option) {
                                    ?>
                                    <option><?php echo $option['route_id']; ?></option>
                                    <?php 
                                }
                            ?>
                        </select>
                        </td>
                        <td>
                        <select class="form-select" aria-label="Default select example" name="route_name" style="width:110px">
                            <?php 
                                foreach ($routename as $option) {
                                    ?>
                                    <option><?php echo $option['route_name']; ?></option>
                                    <?php 
                                }
                            ?>
                        </select>  
                        </td>
                        <td>
                        <select class="form-select" aria-label="Default select example" name="pickup_id" style="width:50px">
                            <?php 
                                foreach ($stageid as $option) {
                                    ?>
                                    <option><?php echo $option['stage_id']; ?></option>
                                    <?php 
                                }
                            ?>
                        </select>  
                        </td>
                        <td>
                        <select class="form-select" aria-label="Default select example" name="pickup_name" style="width:100px">
                            <?php 
                                foreach ($stagename as $option) {
                                    ?>
                                    <option><?php echo $option['stage_name']; ?></option>
                                    <?php 
                                }
                            ?>
                        </select>
                        </td>
                        <td>
                    <select class="form-select" aria-label="Default select example" name="dropoff_id" style="width:50px">
                        <?php 
                            foreach ($stageid as $option) {
                                ?>
                                <option><?php echo $option['stage_id']; ?></option>
                                <?php 
                            }
                        ?>
                    </select>
                        </td>
                        <td>
                        <select class="form-select" aria-label="Default select example" name="dropoff_name" style="width:100px">
                            <?php 
                                foreach ($stagename as $option) {
                                    ?>
                                    <option><?php echo $option['stage_name']; ?></option>
                                    <?php 
                                }
                            ?>
                        </select>
                        </td>
                        <td><input type="number" name="fare_amount" required ="true" style="width:60px" min="1"></td>
                        <td>
                        <select class="form-select" aria-label="Default select example" name="bus_id" style="width:50px">
                            <?php 
                                foreach ($busid as $option) {
                                    ?>
                                    <option><?php echo $option['bus_id']; ?></option>
                                    <?php 
                                }
                            ?>
                        </select> 
                        </td>
                        <td>
                        <select class="form-select" aria-label="Default select example" name="bus_name" style="width:110px">
                            <?php 
                                foreach ($busname as $option) {
                                    ?>
                                    <option><?php echo $option['bus_name']; ?></option>
                                    <?php 
                                }
                            ?>
                        </select>    
                        </td>
                        <td><button class="btn btn-success" type="submit" name="insert_fare" value="save">Insert</button></td>
                    </form>
                </div>
            </div>
        </div>
    </div>          
</body>
</html>