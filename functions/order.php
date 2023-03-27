<?php 

function insertOrder($orderId, $dIssued, $dReceived, $totPrice, $payment, $oUId, $oTId,$rTId, $connect){
    $arr = array();
    $insertTrip = "INSERT INTO ORDERS
    (ORDER_ID, DATE_ISSUED, DATE_RECEIVED, TOTAL_PRICE, PAYMENT_CODE, USER_ID, TRIP_ID, RECEIPT_ID) 
    VALUES 
    ($orderId, '$dIssued', '$dReceived', $totPrice, $payment, $oUId, $oTId,$rTId);";

    try {
        $result = mysqli_query($connect, $insertTrip);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "order inserted\n";
        } else {
            array_push($arr, 0);
            echo json_encode($arr);
        } 
    } catch (Exception $ex) {
        echo $ex->getMessage();
        array_push($arr, 0);
        echo json_encode($arr);
    }
}

function updateOrder($orderId, $dIssued, $dReceived, $totPrice, $payment, $oUId, $oTId,$rTId, $connect){
    $arr = array();
    $updateOrder = "UPDATE ORDERS SET DATE_ISSUED = '$dIssued', DATE_RECEIVED = '$dReceived', 
    TOTAL_PRICE = $totPrice, PAYMENT_CODE = $payment, USER_ID = $oUId, TRIP_ID = $oTId,
    RECEIPT_ID = $rTId WHERE ORDER_ID = $orderId;";

    try {
        $result = mysqli_query($connect, $updateOrder);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "order updated\n";
        } else {
            array_push($arr, 0);
            echo json_encode($arr);
        } 
    } catch (Exception $ex) {
        echo $ex->getMessage();
        array_push($arr, 0);
        echo json_encode($arr);
    }
}

?>
