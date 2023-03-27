<?php

function insertUser($uName, $uLogin, $phone, $uAddress, $uCity, $uProvince, $uPost, $uPassword, $uBalance, $uAcc, $uEmail, $connect){
    $insertUser = "INSERT INTO USERS (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
    POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE, ACCOUNT_TYPE) VALUES ('$uName', '$phone', 
    '$uEmail', '$uAddress', '$uCity', '$uProvince', '$uPost', '$uLogin', '$uPassword', 
    $uBalance, $uAcc);";

    try {
        $result = mysqli_query($connect, $insertUser);
        echo "user 1 inserted\n";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function updateUser($uId, $uName, $uLogin, $phone, $uAddress, $uCity, $uProvince, $uPost, $uPassword, $uBalance, $uAcc, $uEmail, $connect){
    $updateUser = "UPDATE USERS SET UNAME = '$uName', PHONE = '$phone', EMAIL = '$uEmail', 
    UADDRESS = '$uAddress', CITY = '$uCity', PROVINCE = '$uProvince', POSTAL_CODE = '$uPost',
    LOGIN_ID = '$uLogin', UPASSWORD = '$uPassword', BALANCE = $uBalance, ACCOUNT_TYPE = $uAcc 
    WHERE USER_ID = $uId;";

    try {
        $result = mysqli_query($connect, $updateUser);
        echo "user updated\n";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

?>
