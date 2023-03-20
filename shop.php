<?php 

function insertShop($recId, $stCode, $price, $connect){
    $insertShop = "INSERT INTO SHOPPING 
                    (RECEIPT_ID, STORE_CODE, TOTAL_PRICE) 
                    VALUES 
                ($recId, $stCode, $price);";

    try {
        $result = mysqli_query($connect, $insertShop);
        echo "shop inserted\n";
    } catch (Exception $ex) {
        $ex->getMessage();
    }
}

function updateShop($recId, $stCode, $price, $connect){
    $updateShop = "UPDATE SHOPPING
                    SET STORE_CODE = $stCode, TOTAL_PRICE = $price 
                    WHERE RECEIPT_ID = $recId;";

    try {
        $result = mysqli_query($connect, $updateShop);
        echo "shop updated\n";
    } catch (Exception $ex) {
        $ex->getMessage();
    }
}

?>