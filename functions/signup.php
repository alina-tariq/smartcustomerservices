<?php include('connInfo.php');
mysqli_report(MYSQLI_REPORT_ALL);
$conn = connect();


$uName = $_POST["uName"];
$uLogin = $_POST["uLogin"];
$phone = $_POST["phone"];
$uAddress = $_POST["uAddress"];
$uCity = $_POST["uCity"];
$uProvince = $_POST["uProvince"];
$uPost = $_POST["uPost"];
$uPassword = $_POST["uPassword"];
$uBalance = $_POST["uBalance"];
$uAcc = $_POST["uAcc"];
$uEmail = $_POST["uEmail"];
$arr = array();

$insertUser = "INSERT INTO USERS (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
    POSTAL_CODE, LOGIN_ID, UPASSWORD, BALANCE, ACCOUNT_TYPE) VALUES ('$uName', '$phone', 
    '$uEmail', '$uAddress', '$uCity', '$uProvince', '$uPost', '$uLogin', '$uPassword', 
    $uBalance, $uAcc);";

try {
    $result = mysqli_query($conn, $insertUser);
    if ($result) {
        array_push($arr, 1);
        echo json_encode($arr);
    } else {
        array_push($arr, 0);
        echo json_encode($arr);
    }
} catch (Exception $ex) {
    array_push($arr, 0);
    echo json_encode($arr);
}

?>