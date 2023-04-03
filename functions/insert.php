<?php include('connInfo.php');

mysqli_report(MYSQLI_REPORT_ALL);
$connect = connect();
include("truck.php");
include("shop.php");
include("trip.php");
include("user.php");
include("order.php");
include("item.php");

$arr = array();

switch ($_POST["funcName"]) {
    case 'Truck':
        $truckId = $_POST["truckId"];
        $truckCode = $_POST["truckCode"];
        $availCode = $_POST["availCode"];
        insertTruck($truckId, $truckCode, $availCode, $connect);
        break;

    case 'Shop':
        $recId = $_POST["rec_id"];
        $stCode = $_POST["st_code"];
        $price = $_POST["price"];
        insertShop($recId, $stCode, $price, $connect);
        break;

    case 'Trip':
        $tripId = $_POST["tripId"];
        $srcCode = $_POST["srcCode"];
        $price = $_POST["tPrice"];
        $dist = $_POST["dist"];
        $truckId = $_POST["tTruckId"];
        $destCode = $_POST["destCode"];
        insertTrip($tripId, $srcCode, $price, $dist, $truckId, $destCode, $connect);
        break;

    case 'User':
        $uName = $_POST["uName"];
        $uLogin = $_POST["uLogin"];
        $phone = $_POST["phone"];
        $uAddress = $_POST["uAddress"];
        $uCity = $_POST["uCity"];
        $uProvince = $_POST["uProvince"];
        $uPost = $_POST["uPost"];
        $uPassword = md5($_POST["uPassword"]);
        $uBalance = $_POST["uBalance"];
        $uAcc = $_POST["uAcc"];
        $uEmail = $_POST["uEmail"];
        insertUser($uName, $uLogin, $phone, $uAddress, $uCity, $uProvince, $uPost, $uPassword, $uBalance, $uAcc, $uEmail, $connect);
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
        insertOrder($orderId, $dIssued, $dReceived, $totPrice, $payment, $oUId, $oTId, $rTId, $connect);
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

        insertItem($itemId, $itemName, $price, $discount_price, $madeIn, $dept, $qty, $imgData, $connect);
        
        // move image locally
        $imagePath = '/Applications/XAMPP/htdocs/CPS630Project/img/items/' . $_FILES["itemImg"]["name"];
        move_uploaded_file($imgTemp, $imagePath);
        break;
}
?>
