<?php
require_once("queries/connect.php");
include_once ("queries/admin_count.php");

if (isset($_POST['insert_stage']))
{

    $sql= "INSERT INTO stage(stage_name,stage_number,route_id,route_name) VALUES('".$_POST["stage_name"]."', '".$_POST["stage_number"]."', '".$_POST["route_id"]."','".$_POST["route_name"]."')";
    $result = $conn -> query($sql);
    if($result == TRUE){
    echo "Record inserted successfully";
    header("refresh:0; url= admin.php");
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
                    <form action="insert_stage.php" method = "POST" enctype="multipart/form-data">
                        <tr>
                            <th>stage name</th>
                            <th>stage number</th>
                            <th>route id</th>
                            <th>route name</th>
                            <th>insert</th>
                        </tr>
                        <td><input type="text" name="stage_name" required="true" placeholder="Stage name"></td>
                        <td><input type="text" name="stage_number" id="stage_number" required ="true"></td>
                        <td><input type="number" name="route_id" id="route_id" required ="true"></td>
                        <td><input type="text" name="route_name" id="route_name" required ="true"></td>
                        <td><button class="btn btn-success" type="submit" name="insert_stage" value="save">Insert</button></td>
                    </form>
                </div>
            </div>
        </div>
    </div>          
</body>
</html>