<?php 
include "queries/connect.php";
include_once ("queries/admin_count.php");

if(isset($_POST['update_stage'])){
    $stage_id = $_POST['stage_id'];
    $stage_name = $_POST['stage_name'];
    $stage_number= $_POST['stage_number'];
    $route_id = $_POST['route_id'];
    $route_name = $_POST['route_name'];

    $sql =  "UPDATE `stage` SET `stage_name`='$stage_name',`stage_number`='$stage_number',`route_id`='$route_id',`route_name`='$route_name' WHERE `stage_id`='$stage_id'";
    $result = $conn -> query($sql);
    if($result == TRUE){
        header("Location: admin.php");
        echo '<script>alert("Record succesfully updated")</script>"';
    }else{
        echo "Error:" . $sql . "<br>" . $conn -> error;
    }
}

if (isset($_GET['id'])){
    $stage_id = $_GET['id'];
    $sql = " SELECT * FROM `stage` WHERE `stage_id`= $stage_id";
    $result = $conn -> query($sql);
    if($result -> num_rows > 0 ){
        while($row = $result -> fetch_assoc()){
            $stage_id = $row['stage_id'];
            $stage_name = $row['stage_name'];
            $stage_number = $row['stage_number'];
            $route_id = $row['route_id'];
            $route_name = $row['route_name'];
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
                            <th>stage id</th>
                            <th>stage name</th>
                            <th>stage number</th>
                            <th>route id</th>
                            <th>route name</th>
                            <th>update</th>
                        </tr>
                        <tbody>
                            <td><input type="text" name="stage_id" value="<?php echo $stage_id;?>"></td>
                            <td><input type="text" name="stage_name" value="<?php echo $stage_name;?>"></td>
                            <td><input type="text" name="stage_number" value="<?php echo $stage_number;?>"></td>
                            <td><input min="1" type="number" name="route_id" value="<?php echo $route_id;?>"></td>
                            <td><input type="text" name="route_name" value="<?php echo $route_name;?>"></td>
                            <td><button class="btn btn-success" type="submit" name="update_stage">Update</button></td>
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