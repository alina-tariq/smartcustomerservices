<?php include('connInfo.php');

mysqli_report(MYSQLI_REPORT_STRICT);
$connect = connect();

// Insert items
// NOTE: REPLACE ITEM_IMG PATHS WITH YOUR OWN PATHS
// Giving LOAD_FILE a variable or two concatenated variable caused issues

$insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                (1, 'Banana', 0.30, 'Colombia', 9203, 59, 
                LOAD_FILE('/Applications/XAMPP/htdocs/CPS630Project/img/items/banana.png'));";

try {
    $result = mysqli_query($connect, $insertItem);
    echo "banana inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                (2, 'Apple', 0.79, 'China', 9203, 30, 
                LOAD_FILE('/Applications/XAMPP/htdocs/CPS630Project/img/items/apple.png'));";

try {
    $result = mysqli_query($connect, $insertItem);
    echo "apple inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                (3, 'Orange', 1.23, 'Egypt', 9203, 25, 
                LOAD_FILE('/Applications/XAMPP/htdocs/CPS630Project/img/items/orange.png'));";

try {
    $result = mysqli_query($connect, $insertItem);
    echo "orange inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                (4, 'Everything Bagels', 3.47, 'Canada', 4892, 10, 
                LOAD_FILE('/Applications/XAMPP/htdocs/CPS630Project/img/items/bagels.png'));";

try {
    $result = mysqli_query($connect, $insertItem);
    echo "bagels inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                (5, 'Beyond Meat Plant Based', 5.97, 'Canada', 1294, 14, 
                LOAD_FILE('/Applications/XAMPP/htdocs/CPS630Project/img/items/beyondmeat.png'));";

try {
    $result = mysqli_query($connect, $insertItem);
    echo "beyond meat inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                (6, 'Chicken Drumsticks', 17.68, 'Canada', 1294, 9, 
                LOAD_FILE('/Applications/XAMPP/htdocs/CPS630Project/img/items/chicken.png'));";

try {
    $result = mysqli_query($connect, $insertItem);
    echo "chicken inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                (7, 'Lays Chips', 3.47, 'Canada', 3923, 38, 
                LOAD_FILE('/Applications/XAMPP/htdocs/CPS630Project/img/items/chips.png'));";

try {
    $result = mysqli_query($connect, $insertItem);
    echo "chips inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                (8, 'Large Eggs', 3.68, 'Canada', 5892, 28, 
                LOAD_FILE('/Applications/XAMPP/htdocs/CPS630Project/img/items/eggs.png'));";

try {
    $result = mysqli_query($connect, $insertItem);
    echo "eggs inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                (9, '2% Partly Skimmed Milk', 5.89, 'Canada', 5892, 18, 
                LOAD_FILE('/Applications/XAMPP/htdocs/CPS630Project/img/items/milk.png'));";                

try {
    $result = mysqli_query($connect, $insertItem);
    echo "milk inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                (10, 'Oreos', 3.28, 'Canada', 3923, 41, 
                LOAD_FILE('/Applications/XAMPP/htdocs/CPS630Project/img/items/oreos.png'));";                

try {
    $result = mysqli_query($connect, $insertItem);
    echo "oreos inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                (11, 'Spring Mix', 6.97, 'Canada', 9203, 23, 
                LOAD_FILE('/Applications/XAMPP/htdocs/CPS630Project/img/items/springmix.png'));";                

try {
    $result = mysqli_query($connect, $insertItem);
    echo "spring mix inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$insertItem = "INSERT INTO ITEMS 
                (ITEM_ID, ITEM_NAME, PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                VALUES 
                (12, 'Tofu', 2.97, 'Canada', 1294, 20, 
                LOAD_FILE('/Applications/XAMPP/htdocs/CPS630Project/img/items/tofu.png'));";                

try {
    $result = mysqli_query($connect, $insertItem);
    echo "tofu inserted\n";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

// view images

// $viewImage = "SELECT * FROM ITEMS";

// try {
//     $result = mysqli_query($connect, $viewImage);
// } catch (Exception $ex) {
//     echo $ex->getMessage();
// }

// $images = array();
// while ($row = $result->fetch_assoc()) {
//   $images[] = $row['ITEM_IMG'];
// }

// foreach ($images as $image) {
//     echo '<img src="data:image/png;base64,'. base64_encode($image) .'" />';
// }

?>