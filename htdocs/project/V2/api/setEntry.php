<?php
require 'mySQL.php';

if (isset($_POST['userID']) && isset($_POST['entry'])) {
    $userID = intval($_POST['userID']);
    $entry = $_POST['entry'];

    $sql = "INSERT INTO users_notes (userID, entry) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $userID, $entry);
    
    if($stmt->execute()) {
        echo json_encode(["code" => 200]);
    } else {
        echo json_encode(["code" => 404]);
    }
}
