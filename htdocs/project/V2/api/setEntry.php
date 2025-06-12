<?php
require 'mySQL.php';

if (isset($_POST['userID']) && isset($_POST['entry']) && isset($_POST['created_at'])) {
    $userID = intval($_POST['userID']);
    $entry = $_POST['entry'];
    $created_at = $_POST['created_at']; // Format: YYYY-MM-DD

    $sql = "INSERT INTO users_notes (userID, entry, created_at) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $userID, $entry, $created_at);

    if ($stmt->execute()) {
        echo json_encode(["code" => 200]);
    } else {
        echo json_encode(["code" => 404, "error" => $stmt->error]);
    }
} else {
    echo json_encode(["code" => 400, "message" => "Missing data"]);
}
