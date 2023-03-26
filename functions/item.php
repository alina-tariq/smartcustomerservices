<?php 

function insertItem($itemId, $itemName, $price, $madeIn, $dept, $qty, $imgData, $connect){
    $insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                ($itemId, '$itemName', $price, '$madeIn', $dept, $qty, '$imgData');";

    try {
        $result = mysqli_query($connect, $insertItem);
        echo "item inserted\n";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function updateItem($itemId, $itemName, $price, $madeIn, $dept, $qty, $imgData, $connect){
    $updateItem = "UPDATE ITEMS SET ITEM_NAME = '$itemName', 
    PRICE = $price, MADE_IN = '$madeIn', DEPARTMENT_CODE = $dept, QTY = $qty, 
    ITEM_IMG = '$imgData' WHERE ITEM_ID = $itemId;";

    try {
        $result = mysqli_query($connect, $updateItem);
        echo "item updated\n";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

?>