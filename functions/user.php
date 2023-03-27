<?php

function insertUser($uName, $uLogin, $phone, $uAddress, $uCity, $uProvince, $uPost, $uPassword, $uBalance, $uAcc, $uEmail, $connect){
    $arr = array();
    $insertUser = "INSERT INTO USERS (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
    POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE, ACCOUNT_TYPE) VALUES ('$uName', '$phone', 
    '$uEmail', '$uAddress', '$uCity', '$uProvince', '$uPost', '$uLogin', '$uPassword', 
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
    $updateUser = "UPDATE USERS SET UNAME = '$uName', PHONE = '$phone', EMAIL = '$uEmail', 
    UADDRESS = '$uAddress', CITY = '$uCity', PROVINCE = '$uProvince', POSTAL_CODE = '$uPost',
    LOGIN_ID = '$uLogin', UPASSWORD = '$uPassword', BALANCE = $uBalance, ACCOUNT_TYPE = $uAcc 
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
