<?php require_once ("connInfo.php");
mysqli_report(MYSQLI_REPORT_ALL);
$connect = connect();

$createTable = "CREATE TABLE IF NOT EXISTS ITEMS 
(
  ITEM_ID INT NOT NULL 
, ITEM_NAME VARCHAR(50) NOT NULL 
, PRICE FLOAT NOT NULL 
, DISCOUNT_PRICE FLOAT NOT NULL
, MADE_IN VARCHAR(50) NOT NULL 
, DEPARTMENT_CODE INT NOT NULL 
, QTY INT(11) NOT NULL
, ITEM_IMG VARCHAR(60) NOT NULL
, PRIMARY KEY (ITEM_ID) 
);
";
try {
    $result = mysqli_query($connect, $createTable);
    echo "items created <br>";
} catch (Exception $e) { echo $e->getMessage();}

$createTable = "CREATE TABLE IF NOT EXISTS USERS 
(
  USER_ID INT NOT NULL AUTO_INCREMENT
, UNAME VARCHAR(30) NOT NULL 
, PHONE VARCHAR(10) UNIQUE NOT NULL 
, EMAIL VARCHAR(50) UNIQUE NOT NULL
, UADDRESS VARCHAR(70) NOT NULL 
, CITY VARCHAR(30) NOT NULL 
, PROVINCE VARCHAR(2) NOT NULL 
, POSTAL_CODE VARCHAR(6) NOT NULL 
, LOGIN_ID VARCHAR(20) UNIQUE NOT NULL
, UPASSWORD VARCHAR(100) NOT NULL
, SALT VARCHAR(100) NOT NULL 
, BALANCE FLOAT NOT NULL
, ACCOUNT_TYPE INT NOT NULL 
, PRIMARY KEY (USER_ID)
);";
try {
    $result = mysqli_query($connect, $createTable);
    echo "users created <br>";
} catch (Exception $e) { echo $e->getMessage();}

$createTable = "CREATE TABLE IF NOT EXISTS TRUCKS 
(
  TRUCK_ID INT NOT NULL 
, TRUCK_CODE INT NOT NULL 
, AVAILABILITY_CODE INT NOT NULL 
, PRIMARY KEY (TRUCK_ID)
);";
try {
    $result = mysqli_query($connect, $createTable);
    echo "trucks created <br>";
} catch (Exception $e) { echo $e->getMessage();}

$createTable = "CREATE TABLE IF NOT EXISTS SHOPPING 
(
  RECEIPT_ID INT NOT NULL AUTO_INCREMENT
, STORE_CODE INT NOT NULL 
, TOTAL_PRICE FLOAT NOT NULL 
, PRIMARY KEY (RECEIPT_ID)
);";
try {
    $result = mysqli_query($connect, $createTable);
    echo "shopping created <br>";
} catch (Exception $e) { echo $e->getMessage();}

$createTable = "CREATE TABLE IF NOT EXISTS TRIPS 
(
  TRIP_ID INT NOT NULL AUTO_INCREMENT
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
    echo "trips created <br>";
} catch (Exception $e) { echo $e->getMessage();}

$createTable = "CREATE TABLE IF NOT EXISTS ORDERS 
(
  ORDER_ID INT NOT NULL AUTO_INCREMENT 
, DATE_ISSUED DATE NOT NULL 
, DATE_RECEIVED DATE NOT NULL 
, TOTAL_PRICE FLOAT NOT NULL 
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
    echo "orders created <br>";
} catch (Exception $e) { echo $e->getMessage();}

$createTable = "CREATE TABLE IF NOT EXISTS REVIEWS 
(
  REVIEW_ID INT NOT NULL AUTO_INCREMENT
, ITEM_ID INT 
, ORDER_ID INT CHECK (ITEM_ID IS NOT NULL OR ORDER_ID IS NOT NULL)
, RANKING_NUMBER INT NOT NULL
, REVIEW_TXT VARCHAR(200) NOT NULL
, PRIMARY KEY (REVIEW_ID)
, FOREIGN KEY (ITEM_ID) REFERENCES ITEMS (ITEM_ID)
, FOREIGN KEY (ORDER_ID) REFERENCES ORDERS (ORDER_ID)
);";
try {
    $result = mysqli_query($connect, $createTable);
    echo "reviews created <br>";
} catch (Exception $e) { echo $e->getMessage();}