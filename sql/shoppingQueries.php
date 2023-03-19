<?php include('connInfo.php');

mysqli_report(MYSQLI_REPORT_ALL);
$connect = connect();

// Insert shopping

$insertShopping = "INSERT INTO SHOPPING 
                (RECEIPT_ID, STORE_CODE, TOTAL_PRICE) 
                VALUES 
                (1, 3942, 56.39);";

try {
    $result = mysqli_query($connect, $insertShopping);
    echo "shopping 1 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertShopping = "INSERT INTO SHOPPING 
                (RECEIPT_ID, STORE_CODE, TOTAL_PRICE) 
                VALUES 
                (2, 5895, 199.48);";

try {
    $result = mysqli_query($connect, $insertShopping);
    echo "shopping 2 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertShopping = "INSERT INTO SHOPPING 
                (RECEIPT_ID, STORE_CODE, TOTAL_PRICE) 
                VALUES 
                (3, 859, 38.04);";

try {
    $result = mysqli_query($connect, $insertShopping);
    echo "shopping 3 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertShopping = "INSERT INTO SHOPPING 
                (RECEIPT_ID, STORE_CODE, TOTAL_PRICE) 
                VALUES 
                (4, 2909, 483.31);";

try {
    $result = mysqli_query($connect, $insertShopping);
    echo "shopping 4 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertShopping = "INSERT INTO SHOPPING 
                (RECEIPT_ID, STORE_CODE, TOTAL_PRICE) 
                VALUES 
                (5, 1002, 89.52);";

try {
    $result = mysqli_query($connect, $insertShopping);
    echo "shopping 5 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertShopping = "INSERT INTO SHOPPING 
                (RECEIPT_ID, STORE_CODE, TOTAL_PRICE) 
                VALUES 
                (6, 4839, 49.69);";

try {
    $result = mysqli_query($connect, $insertShopping);
    echo "shopping 6 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertShopping = "INSERT INTO SHOPPING 
                (RECEIPT_ID, STORE_CODE, TOTAL_PRICE) 
                VALUES 
                (7, 2035, 95.19);";

try {
    $result = mysqli_query($connect, $insertShopping);
    echo "shopping 7 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertShopping = "INSERT INTO SHOPPING 
                (RECEIPT_ID, STORE_CODE, TOTAL_PRICE) 
                VALUES 
                (8, 4590, 299.38);";

try {
    $result = mysqli_query($connect, $insertShopping);
    echo "shopping 8 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertShopping = "INSERT INTO SHOPPING 
                (RECEIPT_ID, STORE_CODE, TOTAL_PRICE) 
                VALUES 
                (9, 5939, 389.44);";

try {
    $result = mysqli_query($connect, $insertShopping);
    echo "shopping 9 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>
