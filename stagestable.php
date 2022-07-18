<!--Fetches data from the stages table.-->
<?php
    include 'queries/connect.php';
    
    $query ="SELECT `Start` FROM stages";
    $result = $conn->query($query);
    if($result->num_rows>0){
        $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/stagestable.css?v=<?php echo time(); ?>">
        <title>TatuApp</title>
    </head>

<!--Drop down box for different options Pick up point-->
    <body>
        <div class="container">
        <div class="heading">
        <h1>Booking Details</h1>  
        </div>
        <div class="row">
            <div class="col-4">
                <label for="start">start point</label>
                <select name="Start" onChange="onSelectionChange()" id="start" class="form-select" aria-label="Default select example" name="stage_name">
                    <option>Select Pickup Point</option>
                    <?php 
                        foreach ($options as $option) {
                    ?>
                    <option><?php echo $option['Start']; ?> </option>
                    <?php 
                        }
                    ?>
                </select>
            </div>

            <!--Drop down for dropping point/destination-->
            <div class="col-4">
                <label for="destination">destination point</label>
                <select name="Destination" onChange="onSelectionChange()" id="destination" class="form-select" aria-label="Default select example" name="stage_name">
                    <option>Select Dropping Point</option>
                    <?php 
                        foreach ($options as $option) {
                    ?>
                    <option><?php echo $option['Start']; ?> </option>
                    <?php 
                        }
                    ?>
                </select>
            </div>

            <!--Empty lines-->
            <p id="infoText"></p>
            <p id="fareText"></p>

            <!--Booking button-->
            <button class="available" id="bookBtn" onclick="onClickBookBtn()">BOOK</button>

            <!--Import ajax library-->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

            <script>
                var fare = 0;

                function onClickBookBtn() {
                    if (fare === 0) {
                        alert("fare is 0");
                        return;
                    }
                    
                    var baseUrl = "https://morning-basin-87523.herokuapp.com";
                    var amountParam = "?amount=" + fare;
                    window.open(baseUrl + amountParam, "_self");
                }

                // Function to pick values from the pickup and destination drop down.
                function onSelectionChange() {
                    // Reset values of infoText and fareText.
                    document.getElementById("infoText").innerHTML = "";
                    document.getElementById("fareText").innerHTML = "";
                    
                    // Pick values for start and destination point selected and initialize the fare to 0.
                    var startPoint = document.getElementById("start").value;
                    var stopPoint = document.getElementById("destination").value;

                    // Does not give output when blank spaces & prompt message are selected.
                    var hasNotSelectedStartAndDestination = startPoint.trim().length === 0 || stopPoint.trim().length === 0;
                    var isPromptMessage = startPoint === "Select Pickup Point" || stopPoint === "Select Dropping Point";
                    if (hasNotSelectedStartAndDestination || isPromptMessage) {
                        return;
                    }

                    // Concatination of the starting and dropping point and makes a string.
                    document.getElementById("infoText").innerHTML = "Your start point is: " + startPoint + " and your end point is: "  + stopPoint;

                    // Runs another string to fetch the data corresponding to the pickup and drop point stages from fare.php.
                    $.ajax({
                        type: "POST",
                        url: "fare.php",
                        data: { 'start': startPoint, 'stop': stopPoint },
                        success: function(response) {
                            fare = response;
                            document.getElementById("fareText").innerHTML = "KSHS. " + fare;
                        },
                        error: function(response) { 
                            alert("We ran into an issue. Please try again later.");
                        }
                        });
                }
            </script>
        </div>
    </body>
</html>