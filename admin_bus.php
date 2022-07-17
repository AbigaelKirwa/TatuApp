<?php
include_once ("queries/connect.php");
include_once ("queries/admin_count.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Admin</title>
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
                    <tr>
                    <th scope="col">Bus Id</th>   
                    <th scope="col">Bus name</th>
                    <th scope="col">Number plate</th>
                    <th scope="col">Route Id</th>
                    <th scope="col">Bus image</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Changes To Values</th>
                    </tr>
                    <?php
                        if (!isset ($_GET['page']) ) 
                        { $page_number = 1;} 
                        else 
                        { $page_number = $_GET['page'];}  
                        
                        $limit = 3;  
                        $initial_page = ($page_number-1) * $limit; 


                        $sql_select = "SELECT  * FROM `bus`";
                        $results = $conn->query($sql_select);
                        $total_rows = mysqli_num_rows($results);

                        $total_pages = ceil ($total_rows / $limit);
        
                        if($results -> num_rows > 0)
                        {
                            $query = "SELECT *FROM `bus` LIMIT " . $initial_page . ',' . $limit;  
                            $result = mysqli_query($conn, $query);  
                            while($row = mysqli_fetch_array($result)){
                                ?>
                               <tr>
                               <td><?php echo $row['bus_id']; ?></td>
                                   <td><?php echo $row['bus_name']; ?></td>
                                   <td><?php echo $row['number_plate']; ?></td>
                                   <td><?php echo $row['route_id']; ?></td>
                                   <td><img src="<?php echo $row['bus_image']; ?>" style="margin-top:-20px;"></td>
                                   <td><?php echo $row['capacity']; ?></td>
                                   <td>
                                        <button type="button" class="btn btn-warning" id="editbtn"><a name="update_bus" href="update_bus.php?id=<?php echo $row['bus_id']; ?>">Update</a></button>
                                        <button type="button" class="btn btn-danger"id ="deletebtn"><a name="queries/delete_bus" href="queries/delete_bus.php?id=<?php echo $row['route_id']; ?>">Delete</a></button>
                                    </td>
                               </tr>
                               <?php
                            }
                        }
                    ?>
                </table>
                <?php
                    for($page_number = 1; $page_number<= $total_pages; $page_number++) {  

                        echo '<a class="pagination" href = "admin_bus.php?page=' . $page_number . '">' . $page_number . ' </a>';  
                
                    }  
                ?>
            <button type="button" class="btn btn-success" id ="insertbtn"><a name="insert_route" href="insert_bus.php?id=<?php echo $row['id']; ?>">Insert Bus</a></button>
            </div>
                <div class="admin-image">
                    <img src="images/admin.png" alt="">
                </div>
            </div>
        </div>
    </div>
         
    
</body>
</html>