<?php 

function insertItem($itemId, $itemName, $price, $madeIn, $dept, $qty, $imgData, $connect){
    $insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                ($itemId, '$itemName', $price, '$madeIn', $dept, $qty, $imgData);";

    try {
        $result = mysqli_query($connect, $insertItem);
        echo "item inserted\n";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}