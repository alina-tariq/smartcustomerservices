<?php include('connInfo.php');
mysqli_report(MYSQLI_REPORT_ALL);
class Delete {
    public $id;
    public $tableSelected;
    public $connect;

    function __construct($id, $tableSelected) {
        $this->connect = connect();
        $this->id = $id;
        $this->tableSelected = $tableSelected;
    }

    function deleteValue() {
        switch ($this->tableSelected) {
            case 'items':
                $deleteQuery = "DELETE FROM $this->tableSelected WHERE item_id=$this->id";
                break;
            case 'users':
                $deleteQuery = "DELETE FROM $this->tableSelected WHERE user_id=$this->id";
                break;
            case 'trucks':
                $deleteQuery = "DELETE FROM $this->tableSelected WHERE truck_id=$this->id";
                break;  
            case 'trips':
                $deleteQuery = "DELETE FROM $this->tableSelected WHERE trip_id=$this->id";
                break;
            case 'shopping':
                $deleteQuery = "DELETE FROM $this->tableSelected WHERE receipt_id=$this->id";
                break;
            case 'orders':
                $deleteQuery = "DELETE FROM $this->tableSelected WHERE order_id=$this->id";
                break;
        }

        try {
            $result = mysqli_query($this->connect, $deleteQuery);
            echo "Value Removed\n";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

$id = $_POST["id"];
$tableSelected = $_POST["tableSelect"];

$deleteVal = new Delete($id, $tableSelected);
$deleteVal->deleteValue();

?>