<?php
session_start();

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    echo "User ID: " . $userId;
} else {
    echo "Kein Benutzer angemeldet.";
}
?>
