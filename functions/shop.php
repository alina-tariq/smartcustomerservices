<?php 

function insertShop($recId, $stCode, $price, $connect){
    $arr = array();
    $insertShop = "INSERT INTO SHOPPING 
                    (RECEIPT_ID, STORE_CODE, TOTAL_PRICE) 
                    VALUES 
                ($recId, $stCode, $price);";

    try {
        $result = mysqli_query($connect, $insertShop);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "shop inserted\n";
        } else {
            array_push($arr, 0);
            echo json_encode($arr);
        } 
    } catch (Exception $ex) {
        $ex->getMessage();
        array_push($arr, 0);
        echo json_encode($arr);
    }
}

function updateShop($recId, $stCode, $price, $connect){
    $arr = array();
    $updateShop = "UPDATE SHOPPING
                    SET STORE_CODE = $stCode, TOTAL_PRICE = $price 
                    WHERE RECEIPT_ID = $recId;";

    try {
        $result = mysqli_query($connect, $updateShop);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "shop updated\n";
        } else {
            array_push($arr, 0);
            echo json_encode($arr);
        } 
    } catch (Exception $ex) {
        $ex->getMessage();
    }
}

?>