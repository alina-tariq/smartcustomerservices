<?php require_once ('connInfo.php');

mysqli_report(MYSQLI_REPORT_ALL);
$connect = connect();

// Insert trips

$insertTrip = "INSERT INTO TRIPS 
                (TRIP_ID, SOURCE_CODE, DESTINATION_CODE, DISTANCE, TRUCK_ID, PRICE) 
                VALUES 
                (1, 'T3G0E2', 'T8V5P7', 3, 1, 10.39);";

try {
    $result = mysqli_query($connect, $insertTrip);
    echo "trip 1 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertTrip = "INSERT INTO TRIPS 
                (TRIP_ID, SOURCE_CODE, DESTINATION_CODE, DISTANCE, TRUCK_ID, PRICE) 
                VALUES 
                (2, 'L3R2W1', 'M5V3Z7', 15, 2, 49.95);";

try {
    $result = mysqli_query($connect, $insertTrip);
    echo "trip 2 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertTrip = "INSERT INTO TRIPS 
                (TRIP_ID, SOURCE_CODE, DESTINATION_CODE, DISTANCE, TRUCK_ID, PRICE) 
                VALUES 
                (3, 'N5W2Y8', 'L6X2J9', 12, 2, 39.90);";

try {
    $result = mysqli_query($connect, $insertTrip);
    echo "trip 3 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertTrip = "INSERT INTO TRIPS 
                (TRIP_ID, SOURCE_CODE, DESTINATION_CODE, DISTANCE, TRUCK_ID, PRICE) 
                VALUES 
                (4, 'H1G5B0', 'H1H4A2', 1, 6, 4.99);";

try {
    $result = mysqli_query($connect, $insertTrip);
    echo "trip 4 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertTrip = "INSERT INTO TRIPS 
                (TRIP_ID, SOURCE_CODE, DESTINATION_CODE, DISTANCE, TRUCK_ID, PRICE) 
                VALUES 
                (5, 'L4K3Y4', 'L9T5E3', 21, 5, 72.04);";

try {
    $result = mysqli_query($connect, $insertTrip);
    echo "trip 5 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>