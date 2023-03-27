<?php 

function insertItem($itemId, $itemName, $price, $discount_price, $madeIn, $dept, $qty, $imgData, $connect){
    $arr = array();
    $insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, DISCOUNT_PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                ($itemId, '$itemName', $price, $discount_price, '$madeIn', $dept, $qty, '$imgData');";

    try {
        $result = mysqli_query($connect, $insertItem);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "item inserted\n";
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

function updateItem($itemId, $itemName, $price, $discount_price, $madeIn, $dept, $qty, $imgData, $connect){
    $arr = array();
    $updateItem = "UPDATE ITEMS SET ITEM_NAME = '$itemName', 
    PRICE = $price, DISCOUNT_PRICE = $discount_price, MADE_IN = '$madeIn', DEPARTMENT_CODE = $dept, QTY = $qty, 
    ITEM_IMG = '$imgData' WHERE ITEM_ID = $itemId;";

    try {
        $result = mysqli_query($connect, $updateItem);
        if ($result) {
            array_push($arr, 1);
            echo json_encode($arr);
            echo "item updated\n";
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

?>