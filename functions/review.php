<?php include('connInfo.php');
$connect = connect();
function insertReview($itemId, $rankingNumber, $reviewTxt, $connect){
    $insertReview = "INSERT INTO REVIEWS
                (ITEM_ID, RANKING_NUMBER,REVIEW_TXT)
                VALUES
                ($itemId, $rankingNumber,'$reviewTxt');";
    try {
        $result = mysqli_query($connect, $insertReview);
        echo "Review Accepted\n";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

if (isset($_POST['reviewTxt'])) {
    $reviewTxt = $_POST['reviewTxt'];
    $rankingNumber = $_POST['rankingNumber'];
    $itemId = $_POST['itemId'];
    echo($itemId);
    insertReview($itemId, $rankingNumber, $reviewTxt, $connect);
}
?>