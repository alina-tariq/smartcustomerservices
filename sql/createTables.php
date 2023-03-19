<?php include('connInfo.php');

mysqli_report(MYSQLI_REPORT_STRICT);
$connect = connect();

$createTable = "CREATE TABLE ITEMS (
                ITEM_ID INT NOT NULL 
                , ITEM_NAME VARCHAR(50) NOT NULL 
                , PRICE FLOAT NOT NULL 
                , MADE_IN VARCHAR(50) NOT NULL 
                , DEPARTMENT_CODE INT NOT NULL
                , QTY INT NOT NULL
                , ITEM_IMG BLOB NOT NULL
                , PRIMARY KEY (ITEM_ID) 
                );";

try {
    $result = mysqli_query($connect, $createTable);
    echo "items table created\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$createTable = "CREATE TABLE USERS (
                USER_ID INT NOT NULL 
                , UNAME VARCHAR(30) NOT NULL 
                , PHONE VARCHAR(10) UNIQUE NOT NULL 
                , EMAIL VARCHAR(50) UNIQUE NOT NULL
                , UADDRESS VARCHAR(70) NOT NULL 
                , CITY VARCHAR(30) NOT NULL 
                , PROVINCE VARCHAR(2) NOT NULL 
                , POSTAL_CODE VARCHAR(6) NOT NULL 
                , LOGIN_ID VARCHAR(20) UNIQUE NOT NULL
                , UPASSWORD VARCHAR(20) NOT NULL 
                , BALANCE FLOAT NOT NULL 
                , ACCOUNT_TYPE INT NOT NULL 
                , PRIMARY KEY (USER_ID)
                );";

try {
    $result = mysqli_query($connect, $createTable);
    echo "users table created\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$createTable = "CREATE TABLE TRUCKS (
                TRUCK_ID INT NOT NULL 
                , TRUCK_CODE INT NOT NULL 
                , AVAILABILITY_CODE INT NOT NULL 
                , PRIMARY KEY (TRUCK_ID)
                );";

try {
    $result = mysqli_query($connect, $createTable);
    echo "trucks table created\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$createTable = "CREATE TABLE SHOPPING (
                RECEIPT_ID INT NOT NULL 
                , STORE_CODE INT NOT NULL 
                , TOTAL_PRICE FLOAT NOT NULL 
                , PRIMARY KEY (RECEIPT_ID)
                );";

try {
    $result = mysqli_query($connect, $createTable);
    echo "shopping table created\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$createTable = "CREATE TABLE ORDERS (
                ORDER_ID INT NOT NULL 
                , DATE_ISSUED DATE NOT NULL 
                , DATE_RECEIVED DATE NOT NULL 
                , TOTAL_PRICE INT NOT NULL 
                , PAYMENT_CODE INT NOT NULL 
                , USER_ID INT NOT NULL 
                , TRIP_ID INT NOT NULL 
                , RECEIPT_ID INT NOT NULL 
                , PRIMARY KEY (ORDER_ID)
                , FOREIGN KEY (USER_ID) REFERENCES USERS (USER_ID)
                , FOREIGN KEY (TRIP_ID) REFERENCES TRIPS (TRIP_ID)
                , FOREIGN KEY (RECEIPT_ID) REFERENCES SHOPPING (RECEIPT_ID)
                );";

try {
    $result = mysqli_query($connect, $createTable);
    echo "orders table created\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$createTable = "CREATE TABLE TRIPS (
                TRIP_ID INT NOT NULL 
                , SOURCE_CODE VARCHAR(6) NOT NULL 
                , DESTINATION_CODE VARCHAR(6) NOT NULL 
                , DISTANCE INT NOT NULL 
                , TRUCK_ID INT NOT NULL 
                , PRICE FLOAT NOT NULL 
                , PRIMARY KEY (TRIP_ID) 
                , FOREIGN KEY (TRUCK_ID) REFERENCES TRUCKS (TRUCK_ID)
                );";

try {
    $result = mysqli_query($connect, $createTable);
    echo "trips table created\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>