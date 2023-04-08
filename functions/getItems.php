<?php include('connInfo.php');

$connect = connect();
$data = $_POST["values"];

$vals = implode(",", $data);

session_start();
if (isset($_SESSION['type'])){
    if ($_SESSION['type'] == 2){
    $searchQuery = "SELECT ITEM_ID, ITEM_NAME, DISCOUNT_PRICE, ITEM_IMG FROM items";
    } else {
        $searchQuery = "SELECT $vals FROM items";
    }
} else {
    $searchQuery = "SELECT $vals FROM items";
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