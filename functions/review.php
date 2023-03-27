<?php include('connInfo.php');
$connect = connect();
function insertReview($itemId, $rankingNumber, $reviewTxt, $connect){
    $arr = array();
    $insertReview = "INSERT INTO REVIEWS
                (ITEM_ID, RANKING_NUMBER, REVIEW_TXT)
                VALUES
                ($itemId, $rankingNumber,'$reviewTxt');";
    try {
        $result = mysqli_query($connect, $insertReview);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "Review Accepted\n";
        } else {
            array_push($arr, 0);
            echo json_encode($arr);
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
        array_push($arr, 0);
        echo json_encode($arr);
    }
}

function insertOrderReview($itemId, $rankingNumber, $reviewTxt, $connect){
    $arr = array();
    $insertReview = "INSERT INTO REVIEWS
                (ORDER_ID, RANKING_NUMBER, REVIEW_TXT)
                VALUES
                ($itemId, $rankingNumber,'$reviewTxt');";
    try {
        $result = mysqli_query($connect, $insertReview);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "Review Accepted\n";
        } else {
            array_push($arr, 0);
            echo json_encode($arr);
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
        array_push($arr, 0);
        echo json_encode($arr);
    }
}

if (isset($_POST['reviewTxt'])) {
    $reviewTxt = $_POST['reviewTxt'];
    $rankingNumber = $_POST['rankingNumber'];
    $itemId = $_POST['itemId'];
    $reviewTxt = preg_replace("#[[:punct:]]#", "", $reviewTxt);
    insertReview($itemId, $rankingNumber, $reviewTxt, $connect);
} else if (isset($_POST['orderReviewTxt'])) {
    $reviewTxt = $_POST['orderReviewTxt'];
    $rankingNumber = $_POST['rankingNumber'];
    $itemId = $_POST['itemId'];
    $reviewTxt = preg_replace("#[[:punct:]]#", "", $reviewTxt);
    insertOrderReview($itemId, $rankingNumber, $reviewTxt, $connect);
}
?>