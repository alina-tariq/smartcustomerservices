<?php include('connInfo.php');

$connect = connect();
$searchQuery = "SELECT ITEMS.ITEM_NAME, RANKING_NUMBER, REVIEW_TXT FROM 
REVIEWS INNER JOIN ITEMS ON REVIEWS.ITEM_ID = ITEMS.ITEM_ID;";
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