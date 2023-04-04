<?php
function connect() {
    // NOTE: REPLACE WITH YOUR DATABASE SETTINGS
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "scs";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
    
    if ($conn->connect_error) {
        die("Connection failed!");
    } else {
        //echo "Connected\n";
        return $conn;
    }
}

?>