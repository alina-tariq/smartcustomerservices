<?php require_once ('connInfo.php');

mysqli_report(MYSQLI_REPORT_ALL);
$connect = connect();

// Insert users

function generateRandomSalt(){
    return base64_encode(random_bytes(12));
}

$password = "pass123";
$salt = generateRandomSalt();
$hashedPassword = md5($password.$salt);

$insertUser = "INSERT INTO USERS 
                (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, SALT, BALANCE, ACCOUNT_TYPE) 
                VALUES 
                ('Carlo Beck', '9056939978', 'carlobeck@outlook.com', '917 Nipissing Rd',
                'Milton', 'ON', 'L9T5E3', 'carlobeck', '$hashedPassword', '$salt', 86.30, 1);";

try {
    $result = mysqli_query($connect, $insertUser);
    //echo "user 1 inserted\n";
} catch (Exception $ex) {
    //echo $ex->getMessage();
}

$salt = generateRandomSalt();
$hashedPassword = md5($password.$salt);

$insertUser = "INSERT INTO USERS 
                (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, SALT, BALANCE, ACCOUNT_TYPE) 
                VALUES 
                ('Myrtle Tate', '7804301344', 'mtate@gmail.com', '10141 13 Ave NW', 
                'Edmonton', 'AB', 'T6N0B6', 'mtate', '$hashedPassword', '$salt', 0.73, 2);";

try {
    $result = mysqli_query($connect, $insertUser);
    //echo "user 2 inserted\n";
} catch (Exception $ex) {
    //echo $ex->getMessage();
}

$salt = generateRandomSalt();
$hashedPassword = md5($password.$salt);

$insertUser = "INSERT INTO USERS 
                (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, SALT, BALANCE, ACCOUNT_TYPE) 
                VALUES 
                ('Dylan Vaughn', '2045050945', 'dylvaughn@gmail.com', '270 Waterfront Dr', 
                'Winnipeg', 'MB', 'R3B0R6', 'dylvaughn', '$hashedPassword', '$salt', 95.29, 1);";

try {
    $result = mysqli_query($connect, $insertUser);
    //echo "user 3 inserted\n";
} catch (Exception $ex) {
    //echo $ex->getMessage();
}

$salt = generateRandomSalt();
$hashedPassword = md5($password.$salt);

$insertUser = "INSERT INTO USERS 
                (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, SALT, BALANCE, ACCOUNT_TYPE) 
                VALUES 
                ('Murray Jensen', '5197276727', 'murrjen@yahoo.com', '1496 County Road 22',
                'Emeryville', 'ON', 'N0R1A0', 'murrjen', '$hashedPassword', '$salt', 384.53, 1);";

try {
    $result = mysqli_query($connect, $insertUser);
    //echo "user 4 inserted\n";
} catch (Exception $ex) {
    //echo $ex->getMessage();
}

$salt = generateRandomSalt();
$hashedPassword = md5($password.$salt);

$insertUser = "INSERT INTO USERS 
                (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, SALT, BALANCE, ACCOUNT_TYPE) 
                VALUES 
                ('Scott Jordan', '4032167680', 'scottjordan@hotmail.com', '3415 29 St NE',
                'Calgary', 'AB', 'T1Y5J4', 'scottjordan', '$hashedPassword', '$salt', 1.94, 2);";

try {
    $result = mysqli_query($connect, $insertUser);
    //echo "user 5 inserted\n";
} catch (Exception $ex) {
    //echo $ex->getMessage();
}

$salt = generateRandomSalt();
$hashedPassword = md5($password.$salt);

$insertUser = "INSERT INTO USERS 
                (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, SALT, BALANCE, ACCOUNT_TYPE) 
                VALUES 
                ('Molly Houston', '2504784222', 'mhouston@hotmail.com', '868 Langford Pkwy',
                'Victoria', 'BC', 'V9B2P3', 'mhouston', '$hashedPassword', '$salt', 0.05, 1);";

try {
    $result = mysqli_query($connect, $insertUser);
    //echo "user 6 inserted\n";
} catch (Exception $ex) {
    //echo $ex->getMessage();
}

$salt = generateRandomSalt();
$hashedPassword = md5($password.$salt);

$insertUser = "INSERT INTO USERS 
                (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, SALT, BALANCE, ACCOUNT_TYPE) 
                VALUES 
                ('Mabel Castaneda','4504312867', 'castanedam@gmail.com', '629 St Georges',
                'St-Jerome', 'QC', 'J7Z5C2', 'castanedam', '$hashedPassword', '$salt', 59.12, 1);";

try {
    $result = mysqli_query($connect, $insertUser);
    //echo "user 7 inserted\n";
} catch (Exception $ex) {
    //echo $ex->getMessage();
}

$salt = generateRandomSalt();
$hashedPassword = md5($password.$salt);

$insertUser = "INSERT INTO USERS 
                (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, SALT, BALANCE, ACCOUNT_TYPE) 
                VALUES 
                ('Hazel Vance', '6044642040', 'vance.hazel@yahoo.com', '2228 McAllister Ave #102',
                'Port Coquitlam', 'BC', 'V3C2A5', 'vance.hazel', '$hashedPassword', '$salt', 401.34, 2);";

try {
    $result = mysqli_query($connect, $insertUser);
    //echo "user 8 inserted\n";
} catch (Exception $ex) {
    //echo $ex->getMessage();
}

$salt = generateRandomSalt();
$hashedPassword = md5($password.$salt);

$insertUser = "INSERT INTO USERS 
                (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, SALT, BALANCE, ACCOUNT_TYPE) 
                VALUES 
                ('Kieran Bridges', '6045385100', 'kieran@outlook.com', '1554 Foster St',
                'White Rock', 'BC', 'V4B3X8', 'kieran', '$hashedPassword', '$salt', 49.59, 0);";

try {
    $result = mysqli_query($connect, $insertUser);
    //echo "user 9 inserted\n";
} catch (Exception $ex) {
    //echo $ex->getMessage();
}

$salt = generateRandomSalt();
$hashedPassword = md5($password.$salt);

$insertUser = "INSERT INTO USERS 
                (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
                POSTAL_CODE, LOGIN_ID, UPASSWORD, SALT, BALANCE, ACCOUNT_TYPE) 
                VALUES 
                ('Angus Nielsen', '5199667985', 'angniel@gmail.com', '1267 Grand Marais Rd W',
                'Windsor', 'ON', 'N9E1E1', 'angniel', '$hashedPassword', '$salt', 10.51, 2);";


try {
    $result = mysqli_query($connect, $insertUser);
    //echo "user 10 inserted\n";
} catch (Exception $ex) {
    //echo $ex->getMessage();
}

?>

