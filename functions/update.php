<?php include('connInfo.php');
mysqli_report(MYSQLI_REPORT_ALL);

class Update {
    public $connect;
    public $updateType;

    function __construct($updateType) {
        $this->connect = connect();
        $this->updateType = $updateType;
    }

    function updateValue() {
        switch ($this->updateType) {
            case 'Truck':
                $truckId = $_POST["truckId"];
                $truckCode = $_POST["truckCode"];
                $availCode = $_POST["availCode"];
                $this->updateTruck($truckId, $truckCode, $availCode);
                break;
            case 'Shop':
                $recId = $_POST["rec_id"];
                $stCode = $_POST["st_code"];
                $price = $_POST["price"];
                $this->updateShop($recId, $stCode, $price);
                break;
            case 'Trip':
                $tripId = $_POST["tripId"];
                $srcCode = $_POST["srcCode"];
                $price = $_POST["tPrice"];
                $dist = $_POST["dist"];
                $truckId = $_POST["tTruckId"];
                $destCode = $_POST["destCode"];
                $this->updateTrip($tripId, $srcCode, $price, $dist, $truckId, $destCode);
                break;
            case 'User':
                $uId = $_POST["uId"];
                $uName = $_POST["uName"];
                $uLogin = $_POST["uLogin"];
                $phone = $_POST["phone"];
                $uAddress = $_POST["uAddress"];
                $uCity = $_POST["uCity"];
                $uProvince = $_POST["uProvince"];
                $uPost = $_POST["uPost"];
                $uPassword = $_POST["uPassword"];
                $uBalance = $_POST["uBalance"];
                $uAcc = $_POST["uAcc"];
                $uEmail = $_POST["uEmail"];
                $this->updateUser($uId, $uName, $uLogin, $phone, $uAddress, $uCity, $uProvince, $uPost, $uPassword, $uBalance, $uAcc, $uEmail);
                break;
            case 'Order':
                $orderId = $_POST["orderId"];
                $dIssued = date("Y-m-d", strtotime($_POST["dIssued"]));
                $dReceived = date("Y-m-d", strtotime($_POST["dReceived"]));
                $totPrice = $_POST["totPrice"];
                $payment = $_POST["payment"];
                $oUId = $_POST["oUId"];
                $oTId = $_POST["oTId"];
                $rTId = $_POST["rTId"];
                $this->updateOrder($orderId, $dIssued, $dReceived, $totPrice, $payment, $oUId, $oTId, $rTId);
                break;
            case 'Item':
                echo "hello";
                $itemId = $_POST["itemId"];
                $itemName = $_POST["itemName"];
                $price = $_POST["price"];
                $discount_price = $_POST["discount_price"];
                $madeIn = $_POST["madeIn"];
                $dept = $_POST["dept"];
                $qty = $_POST["qty"];
                $imgData = '/img/items/' . $_FILES["itemImg"]["name"];
                $imgTemp = $_FILES["itemImg"]["tmp_name"];
                // also move image locally
                $imagePath = '/Applications/XAMPP/htdocs/CPS630Project/img/items/' . $_FILES["itemImg"]["name"];
                move_uploaded_file($imgTemp, $imagePath);
                echo $imgTemp;
                echo $imagePath;
                $this->updateItem($itemId, $itemName, $price, $discount_price, $madeIn, $dept, $qty, $imgData);
                break;
        }
    }

    function updateTruck($truckId, $truckCode, $availCode) {
        $arr = array();
        $updateTruck = "UPDATE TRUCKS
                        SET TRUCK_CODE = $truckCode, AVAILABILITY_CODE = $availCode
                        WHERE TRUCK_ID = $truckId;";
    
        try {
            $result = mysqli_query($this->connect, $updateTruck);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "Truck updated\n";
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

    function updateShop($recId, $stCode, $price){
        $arr = array();
        $updateShop = "UPDATE SHOPPING
                        SET STORE_CODE = $stCode, TOTAL_PRICE = $price 
                        WHERE RECEIPT_ID = $recId;";

        try {
            $result = mysqli_query($this->connect, $updateShop);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "Shopping receipt updated\n";
            } else {
                array_push($arr, 0);
                echo json_encode($arr);
            } 
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateTrip($tripId, $srcCode, $price, $dist, $truckId, $destCode){
        $arr = array();
        $updateTrip = "UPDATE TRIPS SET SOURCE_CODE = '$srcCode', DESTINATION_CODE = '$destCode',
        DISTANCE = $dist, TRUCK_ID = $truckId, PRICE = $price WHERE TRIP_ID = $tripId;";
    
        try {
            $result = mysqli_query($this->connect, $updateTrip);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "Trip updated\n";
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

    function updateUser($uId, $uName, $uLogin, $phone, $uAddress, $uCity, $uProvince, $uPost, $uPassword, $uBalance, $uAcc, $uEmail){
        $arr = array();
        $searchQuery = "SELECT SALT FROM USERS WHERE USER_ID = $uId;";
        try {
            $result = mysqli_query($this->connect, $searchQuery);
            while($row = $result->fetch_assoc()) {
                $salt = $row['SALT'];
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        $hashedPassword = md5($uPassword.$salt);
        $uPost = preg_replace("/[\s-]+/", "", $uPost);
        $phone = preg_replace("/[\s-]+/", "", $phone);
        $updateUser = "UPDATE USERS SET UNAME = '$uName', PHONE = '$phone', EMAIL = '$uEmail', 
        UADDRESS = '$uAddress', CITY = '$uCity', PROVINCE = '$uProvince', POSTAL_CODE = '$uPost',
        LOGIN_ID = '$uLogin', UPASSWORD = '$hashedPassword', BALANCE = $uBalance, ACCOUNT_TYPE = $uAcc 
        WHERE USER_ID = $uId;";
    
        try {
            $result = mysqli_query($this->connect, $updateUser);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "User updated\n";
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

    function updateOrder($orderId, $dIssued, $dReceived, $totPrice, $payment, $oUId, $oTId,$rTId){
        $arr = array();
        $updateOrder = "UPDATE ORDERS SET DATE_ISSUED = '$dIssued', DATE_RECEIVED = '$dReceived', 
        TOTAL_PRICE = $totPrice, PAYMENT_CODE = $payment, USER_ID = $oUId, TRIP_ID = $oTId,
        RECEIPT_ID = $rTId WHERE ORDER_ID = $orderId;";
    
        try {
            $result = mysqli_query($this->connect, $updateOrder);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "Order updated\n";
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

    function updateItem($itemId, $itemName, $price, $discount_price, $madeIn, $dept, $qty, $imgData){
        $arr = array();
        $updateItem = "UPDATE ITEMS SET ITEM_NAME = '$itemName', PRICE = $price, DISCOUNT_PRICE = $discount_price, MADE_IN = '$madeIn', DEPARTMENT_CODE = $dept, QTY = $qty, ITEM_IMG = '$imgData' WHERE ITEM_ID = $itemId;";
        
        echo "pre trying update";
        try {
            echo "trying update";
            $result = mysqli_query($this->connect, $updateItem);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "Item updated\n";
            } else {
                array_push($arr, 0);
                echo json_encode($arr);
                echo "update failed";
            } 
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo "trying failed";
            array_push($arr, 0);
            echo json_encode($arr);
        }
    }
}

$updateType = $_POST["funcName"];

$updateType = new Update($updateType);
$updateType->updateValue();

?>