<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['userID'])) {
    $_SESSION['userID'] = 0;
}

echo json_encode(["userID" => $_SESSION['userID']]);
?>
