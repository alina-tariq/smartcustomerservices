<?php 

function insertTruck($truckId, $truckCode, $availCode, $connect){
    $arr = array();
    $insertTruck = "INSERT INTO TRUCKS 
                (TRUCK_ID, TRUCK_CODE, AVAILABILITY_CODE) 
                VALUES 
                ($truckId, $truckCode, $availCode);";

    try {
        $result = mysqli_query($connect, $insertTruck);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "truck inserted\n";
        } else {
            array_push($arr, 0);
            echo json_encode($arr);
        }       
    } catch (Exception $ex) {
        $ex->getMessage();
        array_push($arr, 0);
        echo json_encode($arr);
    }
}

function updateTruck($truckId, $truckCode, $availCode, $connect) {
    $arr = array();
    $updateTruck = "UPDATE TRUCKS
                    SET TRUCK_CODE = $truckCode, AVAILABILITY_CODE = $availCode
                    WHERE TRUCK_ID = $truckId;";

    try {
        $result = mysqli_query($connect, $updateTruck);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "truck updated\n";
        } else {
            array_push($arr, 0);
            echo json_encode($arr);
        }       
    } catch (Exception $ex) {
        $ex->getMessage();
        array_push($arr, 0);
        echo json_encode($arr);
    }
}


?>