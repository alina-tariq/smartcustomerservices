<?php 

function insertOrder($orderId, $dIssued, $dReceived, $totPrice, $payment, $oUId, $oTId,$rTId, $connect){
    $insertTrip = "INSERT INTO ORDERS
    (ORDER_ID, DATE_ISSUED, DATE_RECEIVED, TOTAL_PRICE, PAYMENT_CODE, USER_ID, TRIP_ID, RECEIPT_ID) 
    VALUES 
    ($orderId, '$dIssued', '$dReceived', $totPrice, $payment, $oUId, $oTId,$rTId);";

    try {
        $result = mysqli_query($connect, $insertTrip);
        echo "order inserted\n";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function updateOrder($orderId, $dIssued, $dReceived, $totPrice, $payment, $oUId, $oTId,$rTId, $connect){
    $updateOrder = "UPDATE ORDERS SET DATE_ISSUED = '$dIssued', DATE_RECEIVED = '$dReceived', 
    TOTAL_PRICE = $totPrice, PAYMENT_CODE = $payment, USER_ID = $oUId, TRIP_ID = $oTId,
    RECEIPT_ID = $rTId WHERE ORDER_ID = $orderId;";

    try {
        $result = mysqli_query($connect, $updateOrder);
        echo "order updated\n";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

?>
