<?php

function insertUser($uId, $uName, $uLogin, $phone, $uAddress, $uCity, $uProvince, $uPost, $uPassword, $uBalance, $uAcc, $uEmail, $connect){
    $insertUser = "INSERT INTO USERS 
                (USER_ID, UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE, ACCOUNT_TYPE) 
                VALUES 
                ($uId, $uName, $phone, $uEmail, $uAddress, $uCity, $uProvince, $uPost, $uLogin, $uPassword, $uBalance, $uAcc);";

    try {
        $result = mysqli_query($connect, $insertUser);
        echo "user 1 inserted\n";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

?>