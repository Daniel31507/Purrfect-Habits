<?php 
$servername = "db_server";
$port = 3306;
$username = "purrDB";
$password = "rootpassword";
$dbname = "purrDB";

$conn = new mysqli($servername,$username, 
$password, $dbname, $port);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "DB connection failed: " . $conn->connect_error]));
}
?>