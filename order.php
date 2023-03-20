<?php 

function insertOrder($orderId, $dIssued, $dReceived, $totPrice, $payment, $oUId, $oTId,$rTId, $connect){
    $insertTrip = "INSERT INTO ORDERS
    (ORDER_ID, DATE_ISSUED, DATE_RECEIVED, TOTAL_PRICE, PAYMENT_CODE, USER_ID, TRIP_ID, RECEIPT_ID) 
    VALUES 
    ($orderId, $dIssued, $dReceived, $totPrice, $payment, $oUId, $oTId,$rTId);";

    try {
        $result = mysqli_query($connect, $insertTrip);
        echo "trip 1 inserted\n";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

?>