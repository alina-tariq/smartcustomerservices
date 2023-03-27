<?php include('connInfo.php');

$connect = connect();
$distance = $_POST["distance"];
$store_code = $_POST["store_code"];
$total_price = $_POST["total_price"];
$source_code = $_POST["source_code"];
$destination_code = $_POST["destination_code"];
$trip_price = $_POST["trip_price"];
$date_issued = $_POST["date_issued"];
$date_received = date("Y-m-d");
$total_price = floatval($total_price);

$insertShop = "INSERT INTO SHOPPING (STORE_CODE, TOTAL_PRICE) VALUES ($store_code, $total_price);";

try {
    $result = mysqli_query($connect, $insertShop);
    echo "inserted into shop\n";
} catch (Exception $ex) {
    $ex->getMessage();
}

$findTruck = "SELECT truck_id FROM trucks WHERE  AVAILABILITY_CODE=100 ORDER BY RAND() LIMIT 1;";
try {
    $result = mysqli_query($connect, $findTruck);
    $row = mysqli_fetch_assoc($result);
    $truck_id = $row["truck_id"];

} catch (Exception $ex) {
    echo $ex->getMessage();
}



$insertTrip = "INSERT INTO TRIPS (SOURCE_CODE, DESTINATION_CODE, DISTANCE, TRUCK_ID, PRICE) VALUES ('$source_code', '$destination_code', $distance, $truck_id, $trip_price);";

try {
    $result = mysqli_query($connect, $insertTrip);
    echo "trip 1 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$findTrip = "SELECT trip_id FROM trips ORDER BY trip_id DESC LIMIT 1;";
try {
    $result = mysqli_query($connect, $findTrip);
    $row = mysqli_fetch_assoc($result);
    $trip_id = $row["trip_id"];

} catch (Exception $ex) {
    echo $ex->getMessage();
}

$findShop = "SELECT receipt_id FROM shopping ORDER BY receipt_id DESC LIMIT 1;";
try {
    $result = mysqli_query($connect, $findShop);
    $row = mysqli_fetch_assoc($result);
    $receipt_id = $row["receipt_id"];

} catch (Exception $ex) {
    echo $ex->getMessage();
}

$payment_id = rand(1, 1000);
session_start();
$id = $_SESSION["userId"];

$insertOrder = "INSERT INTO ORDERS
(DATE_ISSUED, DATE_RECEIVED, TOTAL_PRICE, PAYMENT_CODE, USER_ID, TRIP_ID, RECEIPT_ID) 
VALUES 
('$date_issued', '$date_received', $total_price, $payment_id, $id, $trip_id, $receipt_id);";

try {
    $result = mysqli_query($connect, $insertOrder);
    echo "inserted into order\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>