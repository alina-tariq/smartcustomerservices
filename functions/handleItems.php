<?php include('connInfo.php');

$connect = connect();
$data = $_POST["values"];

$vals = implode(",", $data);
$vals = strval($vals);

$searchQuery = "SELECT item_id,item_name,price FROM items WHERE item_id IN ($vals)";


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