<?php include('connInfo.php');

$connect = connect();
$data = $_POST["values"];

$vals = implode(",", $data);

$searchQuery = "SELECT $vals FROM items";


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