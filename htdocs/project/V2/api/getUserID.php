<?php
session_start();

if (!isset($_SESSION['userID'])) {
    $_SESSION['userID'] = 0;
} else {
    echo json_encode(["userID" => $_SESSION['userID']]);
}
?>
