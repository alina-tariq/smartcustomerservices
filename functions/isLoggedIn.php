<?php
session_start();
$arr = array();

if (isset($_SESSION["loggedin"])){
    if ($_SESSION["loggedin"] == true){
        array_push($arr, 1);
    } else {
        array_push($arr, 0);
    }
} else {
    array_push($arr, 0);
}

echo json_encode($arr);




?>