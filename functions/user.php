<?php

function generateRandomSalt(){
    return base64_encode(random_bytes(12));
}

function insertUser($uName, $uLogin, $phone, $uAddress, $uCity, $uProvince, $uPost, $uPassword, $uBalance, $uAcc, $uEmail, $connect){
    $arr = array();
    $salt = generateRandomSalt();
    $hashedPassword = md5($uPassword.$salt);
    $uPost = preg_replace("/[\s-]+/", "", $uPost);
    $phone = preg_replace("/[\s-]+/", "", $phone);
    $insertUser = "INSERT INTO USERS (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
    POSTAL_CODE, LOGIN_ID, UPASSWORD, SALT, BALANCE, ACCOUNT_TYPE) VALUES ('$uName', '$phone', 
    '$uEmail', '$uAddress', '$uCity', '$uProvince', '$uPost', '$uLogin', '$hashedPassword', '$salt', 
    $uBalance, $uAcc);";

    try {
        $result = mysqli_query($connect, $insertUser);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "user 1 inserted\n";
        } else {
            array_push($arr, 0);
            echo json_encode($arr);
        }        
    } catch (Exception $ex) {
        echo $ex->getMessage();
        array_push($arr, 0);
        echo json_encode($arr);
    }
}

function updateUser($uId, $uName, $uLogin, $phone, $uAddress, $uCity, $uProvince, $uPost, $uPassword, $uBalance, $uAcc, $uEmail, $connect){
    $arr = array();
    $searchQuery = "SELECT SALT FROM USERS WHERE USER_ID = $uId;";
    try {
        $result = mysqli_query($connect, $searchQuery);
        while($row = $result->fetch_assoc()) {
            $salt = $row['SALT'];
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    $hashedPassword = md5($uPassword.$salt);
    $uPost = preg_replace("/[\s-]+/", "", $uPost);
    $phone = preg_replace("/[\s-]+/", "", $phone);
    $updateUser = "UPDATE USERS SET UNAME = '$uName', PHONE = '$phone', EMAIL = '$uEmail', 
    UADDRESS = '$uAddress', CITY = '$uCity', PROVINCE = '$uProvince', POSTAL_CODE = '$uPost',
    LOGIN_ID = '$uLogin', UPASSWORD = '$hashedPassword', BALANCE = $uBalance, ACCOUNT_TYPE = $uAcc 
    WHERE USER_ID = $uId;";

    try {
        $result = mysqli_query($connect, $updateUser);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "user updated\n";
        } else {
            array_push($arr, 0);
            echo json_encode($arr);
        }        
        
    } catch (Exception $ex) {
        echo $ex->getMessage();
        array_push($arr, 0);
        echo json_encode($arr);
    }
}

?>
