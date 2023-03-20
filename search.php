<?php include('connInfo.php');

$connect = connect();

$id = $_POST["id"];
$type = $_POST["type"];

switch ($type){
    case 'userId':
        $searchQuery = "SELECT * FROM ORDERS WHERE user_id=$id;";
        break;
    case 'orderId':
        $searchQuery = "SELECT * FROM ORDERS WHERE order_id=$id;";
        break;
}


try {
    $result = mysqli_query($connect, $searchQuery);
    $rows = [];
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }
    echo json_encode($rows);
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>
