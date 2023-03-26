<?php include('connInfo.php');

mysqli_report(MYSQLI_REPORT_ALL);
$connect = connect();
session_start();
$id = $_SESSION["userId"];
echo $id;

$updatePremium = "UPDATE USERS SET ACCOUNT_TYPE = 2 WHERE USER_ID = $id;";
$_SESSION["type"] = 2;

try {
$result = mysqli_query($connect, $updatePremium);
echo "user has been made premium\n";
} catch (Exception $ex) {
$ex->getMessage();
}


?>