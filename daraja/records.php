<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lipa na mpesa</title>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link href="" rel="stylesheet" />
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" ">
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
    ></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap");

      body {
        background-color: #eaedf4;
        font-family: "Rubik", sans-serif;
      }

      .card {
        width: 310px;
        border: none;
        border-radius: 15px;
      }

      .justify-content-around div {
        border: none;
        border-radius: 20px;
        background: #f3f4f6;
        padding: 5px 20px 5px;
        color: #8d9297;
      }

      .justify-content-around span {
        font-size: 12px;
      }

      .justify-content-around div:hover {
        background: #545ebd;
        color: #fff;
        cursor: pointer;
      }

      .justify-content-around div:nth-child(1) {
        background: #545ebd;
        color: #fff;
      }

      span.mt-0 {
        color: #8d9297;
        font-size: 12px;
      }

      h6 {
        font-size: 15px;
      }
      .mpesa {
        background-color: green !important;
      }
      .tab{
        color:grey;
        text-decoration:none!important;
      }
      .tab:hover{
        color:white!important;
      }
      .mpesa-tab:hover{
        background-color: green !important;
 
      }
      .custom-record{
        width: 600px!important;
      }
      img {
        border-radius: 15px;
      }
    </style>
  </head>
  <body oncontextmenu="return false" class="snippet-body">
    <div class="container d-flex justify-content-center">
      <div class="card  custom-record mt-5 px-3 py-4">
        <div class="d-flex flex-row justify-content-around">
          <a href="./index.php" class="tab">
          <div style="background-color:#F3F4F6;" class="mpesa-tab" ><span class="tab">Mpesa </span></div>
          </a>
          <div style="background-color:#545EBD; color:white;" ><span >Records</span></div>
          <div style="display:none;"><span>Card</span></div>
        </div>
        <div class="media mt-4 pl-2">
          <img src="./images/1200px-M-PESA_LOGO-01.svg.png" class="mr-3" height="75" />
          <div class="media-body">
              <br>
            <h6 class="mt-1">Transaction Records</h6>
          </div>
        </div>
        <div class="media mt-3 pl-2">
                          <!--bs5 input-->
       <div class="table-responsive" >
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Transaction NO</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

    $conn = mysqli_connect("localhost","root","","daraja",3306);

    $query = "SELECT * FROM daraja";
    $result = $conn->query($query);

    while($row = mysqli_fetch_array($result))
    {
        ?>
                    <tr>
                        <td style="color:black;"><?php echo $row[0]; ?></td>
                        <td style="color:green;"><?php echo $row[1]; ?></td>
                        <td style="color:crimson;"><?php echo $row[2]; ?></td>
                        <td style="color:green;"><?php echo $row[3]; ?></td>

                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
              <!--bs5 input-->
          </div>
        </div>
      </div>
    </div>
    <script
      type="text/javascript"
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
    ></script>
    <script type="text/javascript" src=""></script>
    <script type="text/javascript" src=""></script>
    <script type="text/Javascript"></script>
  </body>
</html>
