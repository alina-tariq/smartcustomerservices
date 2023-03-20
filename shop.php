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


?>