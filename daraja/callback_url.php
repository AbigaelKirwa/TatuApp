<?php
 		header("Content-Type: application/json");

     $response = '{
         "ResultCode": 0, 
         "ResultDesc": "Confirmation Received Successfully"
     }';
 
     // DATA
     $mpesaResponse = file_get_contents('php://input');
 
     // log the response
     $logFile = "M_PESAConfirmationResponse.json";
 
     // write to file
     $log = fopen($logFile, "a");
 
     fwrite($log, $mpesaResponse);
     fclose($log);

     //Processing the Mpesa json response data
     $mpesaResponse = file_get_contents('M_PESAConfirmationResponse.json');
     $callbackContent = json_decode($mpesaResponse);
     echo $callbackContent;

     $Resultcode = $callbackContent->Body->stkCallback->ResultCode;
     $CheckoutRequestID = $callbackContent->Body->stkCalback->CheckoutRequestID;
     $Amount = $callbackContent->Body->stkCallbackMetadata->Item[0]->Value;
     $MpesaReceiptNumber = $callbackContent->Body->stkCallback->callbackMetadata->Item[1]->Value;
     $phoneNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[4]->Value;
     $formatedPhone = str_replace("254", "0", $PhoneNumber);
     if ($Resultcode == 0) {
      //connect to DB
      $conn = mysqli_connect("localhost","root","","daraja",3306);
     }

     //Check connection
     if ($conn->connect_error) {
      die("<h1>Connection failed</h1> " . $conn->connect_error);
     } else {
      $insert = $conn->query("INSERT INTO daraja(CheckoutRequestId,ResultCode,amount,MpesaReceiptNumber,PhoneNumber");
      $conn = null;
     }
 
     echo $response;
