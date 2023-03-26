<?php include('connInfo.php');

mysqli_report(MYSQLI_REPORT_ALL);
$connect = connect();

$id = $_POST["id"];
$tableSelected = $_POST["tableSelect"];

switch ($tableSelected){
    case 'items':
        $deleteQuery = "DELETE FROM $tableSelected WHERE item_id=$id";
        break;
    case 'users':
        $deleteQuery = "DELETE FROM $tableSelected WHERE user_id=$id";
        break;
    case 'trucks':
        $deleteQuery = "DELETE FROM $tableSelected WHERE truck_id=$id";
        break;  
    case 'trips':
        $deleteQuery = "DELETE FROM $tableSelected WHERE trip_id=$id";
        break;
    case 'shopping':
        $deleteQuery = "DELETE FROM $tableSelected WHERE receipt_id=$id";
        break;
    case 'orders':
        $deleteQuery = "DELETE FROM $tableSelected WHERE order_id=$id";
        break;
}


try {
    $result = mysqli_query($connect, $deleteQuery);
    echo "value removed\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>