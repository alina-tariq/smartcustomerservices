<?php include('connInfo.php');

$connect = connect();
$searchQuery = "SELECT ORDER_ID, RANKING_NUMBER, REVIEW_TXT FROM REVIEWS";
try {
    $result = mysqli_query($connect, $searchQuery);
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>