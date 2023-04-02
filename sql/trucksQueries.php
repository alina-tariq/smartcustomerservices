<?php require_once ('connInfo.php');

mysqli_report(MYSQLI_REPORT_ALL);
$connect = connect();

// Insert trucks

$insertTruck = "INSERT INTO TRUCKS 
                (TRUCK_ID, TRUCK_CODE, AVAILABILITY_CODE) 
                VALUES 
                (1, 3804, 100);";

try {
    $result = mysqli_query($connect, $insertTruck);
    echo "truck 1 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertTruck = "INSERT INTO TRUCKS 
                (TRUCK_ID, TRUCK_CODE, AVAILABILITY_CODE) 
                VALUES 
                (2, 4887, 100);";

try {
    $result = mysqli_query($connect, $insertTruck);
    echo "truck 1 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertTruck = "INSERT INTO TRUCKS 
                (TRUCK_ID, TRUCK_CODE, AVAILABILITY_CODE) 
                VALUES 
                (3, 5914, 105);";

try {
    $result = mysqli_query($connect, $insertTruck);
    echo "truck 1 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertTruck = "INSERT INTO TRUCKS 
                (TRUCK_ID, TRUCK_CODE, AVAILABILITY_CODE) 
                VALUES 
                (4, 5892, 109);";

try {
    $result = mysqli_query($connect, $insertTruck);
    echo "truck 1 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertTruck = "INSERT INTO TRUCKS 
                (TRUCK_ID, TRUCK_CODE, AVAILABILITY_CODE) 
                VALUES 
                (5, 8028, 105);";

try {
    $result = mysqli_query($connect, $insertTruck);
    echo "truck 1 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertTruck = "INSERT INTO TRUCKS 
                (TRUCK_ID, TRUCK_CODE, AVAILABILITY_CODE) 
                VALUES 
                (6, 8194, 105);";

try {
    $result = mysqli_query($connect, $insertTruck);
    echo "truck 1 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertTruck = "INSERT INTO TRUCKS 
                (TRUCK_ID, TRUCK_CODE, AVAILABILITY_CODE) 
                VALUES 
                (7, 4295, 109);";

try {
    $result = mysqli_query($connect, $insertTruck);
    echo "truck 7 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>