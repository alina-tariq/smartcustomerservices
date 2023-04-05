<?php include('connInfo.php');

class Review {
    public $connect;
    public $reviewType;

    function __construct($reviewType) {
        $this->connect = connect();
        $this->reviewType = $reviewType;
    }

    function addReview() {
        switch ($this->reviewType) {
            case 'Item':
                $itemId = $_POST['itemId'];
                $rankingNumber = $_POST['rankingNumber'];
                $reviewTxt = $_POST['reviewTxt'];                
                $reviewTxt = preg_replace("#[[:punct:]]#", "", $reviewTxt);
                $this->insertItemReview($itemId, $rankingNumber, $reviewTxt);
                break;
            case 'Order':
                $orderId = $_POST['orderId'];
                $rankingNumber = $_POST['rankingNumber'];
                $reviewTxt = $_POST['orderReviewTxt'];
                $reviewTxt = preg_replace("#[[:punct:]]#", "", $reviewTxt);
                $this->insertOrderReview($orderId, $rankingNumber, $reviewTxt);
                break;
        }
    }

    function insertItemReview($itemId, $rankingNumber, $reviewTxt){
        $arr = array();
        $insertReview = "INSERT INTO REVIEWS (ITEM_ID, RANKING_NUMBER, REVIEW_TXT) 
                        VALUES ($itemId, $rankingNumber, '$reviewTxt');";
        try {
            $result = mysqli_query($this->connect, $insertReview);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "Item Review Accepted\n";
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

    function insertOrderReview($orderId, $rankingNumber, $reviewTxt){
        $arr = array();
        $insertReview = "INSERT INTO REVIEWS (ORDER_ID, RANKING_NUMBER, REVIEW_TXT)
                        VALUES ($orderId, $rankingNumber,'$reviewTxt');";
        try {
            $result = mysqli_query($this->connect, $insertReview);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "Order Review Accepted\n";
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
}

$reviewType = '';
if (isset($_POST['itemId'])) {
    $reviewType = 'Item';
} else if (isset($_POST['orderId'])) {
    $reviewType = 'Order';
}

$review = new Review($reviewType);
$review->addReview();

?>