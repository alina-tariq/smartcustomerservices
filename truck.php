<?php 

function insertTruck($truckId, $truckCode, $availCode, $connect){
    $insertTruck = "INSERT INTO TRUCKS 
                (TRUCK_ID, TRUCK_CODE, AVAILABILITY_CODE) 
                VALUES 
                ($truckId, $truckCode, $availCode);";

    try {
        $result = mysqli_query($connect, $insertTruck);
        echo "truck inserted\n";
    } catch (Exception $ex) {
        $ex->getMessage();
    }
}


?>