<?php 

function insertTrip($tripId, $srcCode, $price, $dist, $truckId, $destCode, $connect){
    $arr = array();
    $insertTrip = "INSERT INTO TRIPS 
    (TRIP_ID, SOURCE_CODE, DESTINATION_CODE, DISTANCE, TRUCK_ID, PRICE) 
    VALUES 
    ($tripId, $srcCode, $destCode, $dist, $truckId, $price);";

    try {
        $result = mysqli_query($connect, $insertTrip);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "trip inserted\n";
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

function updateTrip($tripId, $srcCode, $price, $dist, $truckId, $destCode, $connect){
    $arr = array();
    $updateTrip = "UPDATE TRIPS SET SOURCE_CODE = '$srcCode', DESTINATION_CODE = '$destCode',
    DISTANCE = $dist, TRUCK_ID = $truckId, PRICE = $price WHERE TRIP_ID = $tripId;";

    try {
        $result = mysqli_query($connect, $updateTrip);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "trip updated\n";
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