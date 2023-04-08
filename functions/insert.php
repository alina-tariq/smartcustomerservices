<?php include('connInfo.php');
mysqli_report(MYSQLI_REPORT_ALL);

class Insert {
    public $connect;
    public $insertType;

    function __construct($insertType) {
        $this->connect = connect();
        $this->insertType = $insertType;
    }

    function insertValue() {
        switch ($this->insertType) {
            case 'Truck':
                $truckId = $_POST["truckId"];
                $truckCode = $_POST["truckCode"];
                $availCode = $_POST["availCode"];
                $this->insertTruck($truckId, $truckCode, $availCode);
                break;
            case 'Shop':
                $recId = $_POST["rec_id"];
                $stCode = $_POST["st_code"];
                $price = $_POST["price"];
                $this->insertShop($recId, $stCode, $price);
                break;
            case 'Trip':
                $tripId = $_POST["tripId"];
                $srcCode = $_POST["srcCode"];
                $price = $_POST["tPrice"];
                $dist = $_POST["dist"];
                $truckId = $_POST["tTruckId"];
                $destCode = $_POST["destCode"];
                $this->insertTrip($tripId, $srcCode, $price, $dist, $truckId, $destCode);
                break;
            case 'User':
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
                $this->insertUser($uName, $uLogin, $phone, $uAddress, $uCity, $uProvince, $uPost, $uPassword, $uBalance, $uAcc, $uEmail);
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
                $this->insertOrder($orderId, $dIssued, $dReceived, $totPrice, $payment, $oUId, $oTId, $rTId);
                break;
            case 'Item':
                $itemId = $_POST["itemId"];
                $itemName = $_POST["itemName"];
                $price = $_POST["price"];
                $discount_price = $_POST["discount_price"];
                $madeIn = $_POST["madeIn"];
                $dept = $_POST["dept"];
                $qty = $_POST["qty"];
                $imgData = '/img/items/' . $_FILES["itemImg"]["name"];
                $imgTemp = $_FILES["itemImg"]["tmp_name"];
                $this->insertItem($itemId, $itemName, $price, $discount_price, $madeIn, $dept, $qty, $imgData);
                // also move image locally
                $imagePath = '/Applications/XAMPP/htdocs/CPS630Project/img/items/' . $_FILES["itemImg"]["name"];
                move_uploaded_file($imgTemp, $imagePath);
                echo "moved";
                break;
        }
    }

    function generateRandomSalt(){
        return base64_encode(random_bytes(12));
    }

    function insertTruck($truckId, $truckCode, $availCode){
        $arr = array();
        $insertTruck = "INSERT INTO TRUCKS (TRUCK_ID, TRUCK_CODE, AVAILABILITY_CODE) 
                        VALUES ($truckId, $truckCode, $availCode);";
    
        try {
            $result = mysqli_query($this->connect, $insertTruck);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "Truck inserted\n";
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

    function insertShop($recId, $stCode, $price){
        $arr = array();
        $insertShop = "INSERT INTO SHOPPING (RECEIPT_ID, STORE_CODE, TOTAL_PRICE) 
                        VALUES ($recId, $stCode, $price);";
    
        try {
            $result = mysqli_query($this->connect, $insertShop);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "Shopping receipt inserted\n";
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

    function insertTrip($tripId, $srcCode, $price, $dist, $truckId, $destCode){
        $arr = array();
        $insertTrip = "INSERT INTO TRIPS (TRIP_ID, SOURCE_CODE, DESTINATION_CODE, DISTANCE, TRUCK_ID, PRICE) 
        VALUES ($tripId, '$srcCode', '$destCode', $dist, $truckId, $price);";
    
        try {
            $result = mysqli_query($this->connect, $insertTrip);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "Trip inserted\n";
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

    function insertUser($uName, $uLogin, $phone, $uAddress, $uCity, $uProvince, $uPost, $uPassword, $uBalance, $uAcc, $uEmail){
        $arr = array();
        $salt = $this->generateRandomSalt();
        $hashedPassword = md5($uPassword.$salt);
        $uPost = preg_replace("/[\s-]+/", "", $uPost);
        $phone = preg_replace("/[\s-]+/", "", $phone);
        $insertUser = "INSERT INTO USERS (UNAME, PHONE, EMAIL, UADDRESS, CITY, PROVINCE, 
        POSTAL_CODE, LOGIN_ID, UPASSWORD, SALT, BALANCE, ACCOUNT_TYPE) VALUES ('$uName', '$phone', 
        '$uEmail', '$uAddress', '$uCity', '$uProvince', '$uPost', '$uLogin', '$hashedPassword', '$salt', 
        $uBalance, $uAcc);";
    
        try {
            $result = mysqli_query($this->connect, $insertUser);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "User inserted\n";
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

    function insertOrder($orderId, $dIssued, $dReceived, $totPrice, $payment, $oUId, $oTId,$rTId){
        $arr = array();
        $insertTrip = "INSERT INTO ORDERS
        (ORDER_ID, DATE_ISSUED, DATE_RECEIVED, TOTAL_PRICE, PAYMENT_CODE, USER_ID, TRIP_ID, RECEIPT_ID) 
        VALUES 
        ($orderId, '$dIssued', '$dReceived', $totPrice, $payment, $oUId, $oTId,$rTId);";
    
        try {
            $result = mysqli_query($this->connect, $insertTrip);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "Order inserted\n";
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

    function insertItem($itemId, $itemName, $price, $discount_price, $madeIn, $dept, $qty, $imgData){
        $arr = array();
        $insertItem = "INSERT INTO ITEMS 
                    (ITEM_ID, ITEM_NAME, PRICE, DISCOUNT_PRICE, MADE_IN, DEPARTMENT_CODE, QTY, ITEM_IMG) 
                    VALUES 
                    ($itemId, '$itemName', $price, $discount_price, '$madeIn', $dept, $qty, '$imgData');";
    
        try {
            $result = mysqli_query($this->connect, $insertItem);
            if ($result) {
                array_push($arr, 1);
                echo json_encode($arr);
                echo "Item inserted\n";
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

$insertType = $_POST["funcName"];
$insertVal = new Insert($insertType);
$insertVal->insertValue();

?>
