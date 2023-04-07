<?php include('connInfo.php');

class Select {
    public $connect;
    public $table;
    public $vals;

    function __construct($table, $data) {
        $this->connect = connect();
        $this->table = $table;
        $this->vals = implode(",", $data);
    }

    function returnSearch() {
        $searchQuery = "SELECT $this->vals FROM $this->table";
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

$table = $_POST["tablename"];
$data = $_POST["values"];


$select = new Select($table, $data);
$select->returnSearch();
