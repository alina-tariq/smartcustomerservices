<?php include('connInfo.php');

class Search {
    public $connect;
    public $id;
    public $orderType;

    function __construct($id, $orderType) {
        $this->connect = connect();
        $this->id = $id;
        $this->orderType = $orderType;
    }

    function searchOrder() {
        switch ($this->orderType) {
            case 'userId':
                $searchQuery = "SELECT * FROM ORDERS WHERE user_id=$this->id;";
                break;
            case 'orderId':
                $searchQuery = "SELECT * FROM ORDERS WHERE order_id=$this->id;";
                break;
        }
    
        try {
            $result = mysqli_query($this->connect, $searchQuery);
            $rows = [];
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            echo json_encode($rows);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

$connect = connect();

$id = $_POST["id"];
$type = $_POST["type"];

$search = new Search($id, $type);
$search->searchOrder();


?>
