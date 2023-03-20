<?php 

function insertTrip($tripId, $srcCode, $price, $dist, $truckId, $destCode, $connect){
    $insertTrip = "INSERT INTO TRIPS 
    (TRIP_ID, SOURCE_CODE, DESTINATION_CODE, DISTANCE, TRUCK_ID, PRICE) 
    VALUES 
    ($tripId, $srcCode, $destCode, $dist, $truckId, $price);";

    try {
        $result = mysqli_query($connect, $insertTrip);
        echo "trip 1 inserted\n";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

?>