<?php include('connInfo.php');

mysqli_report(MYSQLI_REPORT_ALL);
$connect = connect();

// Insert users

$insertUser = "INSERT INTO USERS 
                (USER_ID, UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE) 
                VALUES 
                (1, 'Carlo Beck', '9056939978', 'carlobeck@outlook.com', '917 Nipissing Rd',
                'Milton', 'ON', 'L9T5E3', 'carlobeck', 'pass123', 86.30);";

try {
    $result = mysqli_query($connect, $insertUser);
    echo "user 1 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertUser = "INSERT INTO USERS 
                (USER_ID, UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE) 
                VALUES 
                (2, 'Myrtle Tate', '7804301344', 'mtate@gmail.com', '10141 13 Ave NW', 
                'Edmonton', 'AB', 'T6N0B6', 'mtate', 'pass123', 0.73);";

try {
    $result = mysqli_query($connect, $insertUser);
    echo "user 2 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertUser = "INSERT INTO USERS 
                (USER_ID, UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE) 
                VALUES 
                (3, 'Dylan Vaughn', '2045050945', 'dylvaughn@gmail.com', '270 Waterfront Dr', 
                'Winnipeg', 'MB', 'R3B0R6', 'dylvaughn', 'pass123', 95.29);";

try {
    $result = mysqli_query($connect, $insertUser);
    echo "user 3 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertUser = "INSERT INTO USERS 
                (USER_ID, UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE) 
                VALUES 
                (4, 'Murray Jensen', '5197276727', 'murrjen@yahoo.com', '1496 County Road 22',
                'Emeryville', 'ON', 'N0R1A0', 'murrjen', 'pass123', 384.53);";

try {
    $result = mysqli_query($connect, $insertUser);
    echo "user 4 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertUser = "INSERT INTO USERS 
                (USER_ID, UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE) 
                VALUES 
                (5, 'Scott Jordan', '4032167680', 'scottjordan@hotmail.com', '3415 29 St NE',
                'Calgary', 'AB', 'T1Y5J4', 'scottjordan', 'pass123', 1.94);";

try {
    $result = mysqli_query($connect, $insertUser);
    echo "user 5 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertUser = "INSERT INTO USERS 
                (USER_ID, UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE) 
                VALUES 
                (6, 'Molly Houston', '2504784222', 'mhouston@hotmail.com', '868 Langford Pkwy',
                'Victoria', 'BC', 'V9B2P3', 'mhouston', 'pass123', 0.05);";

try {
    $result = mysqli_query($connect, $insertUser);
    echo "user 6 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertUser = "INSERT INTO USERS 
                (USER_ID, UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE) 
                VALUES 
                (7, 'Mabel Castaneda','4504312867', 'castanedam@gmail.com', '629 St Georges',
                'St-Jerome', 'QC', 'J7Z5C2', 'castanedam', 'pass123', 59.12);";

try {
    $result = mysqli_query($connect, $insertUser);
    echo "user 7 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertUser = "INSERT INTO USERS 
                (USER_ID, UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE) 
                VALUES 
                (8, 'Hazel Vance', '6044642040', 'vance.hazel@yahoo.com', '2228 McAllister Ave #102',
                'Port Coquitlam', 'BC', 'V3C2A5', 'vance.hazel', 'pass123', 401.34);";

try {
    $result = mysqli_query($connect, $insertUser);
    echo "user 8 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertUser = "INSERT INTO USERS 
                (USER_ID, UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE) 
                VALUES 
                (9, 'Kieran Bridges', '6045385100', 'kieran@outlook.com', '1554 Foster St',
                'White Rock', 'BC', 'V4B3X8', 'kieran', 'pass123', 49.59);";

try {
    $result = mysqli_query($connect, $insertUser);
    echo "user 9 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertUser = "INSERT INTO USERS 
                (USER_ID, UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE) 
                VALUES 
                (10, 'Angus Nielsen', '5199667985', 'angniel@gmail.com', '1267 Grand Marais Rd W',
                'Windsor', 'ON', 'N9E1E1', 'angniel', 'pass123', 10.51);";


try {
    $result = mysqli_query($connect, $insertUser);
    echo "user 10 inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>

