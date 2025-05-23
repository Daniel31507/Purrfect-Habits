<?php
require 'mySQL.php';

if (isset($_POST['userID']) && isset($_POST['habitID'])) {
    $userID = intval($_POST['userID']);
    $habitID = intval($_POST['habitID']);

    $stmtUpdate = $conn->prepare("UPDATE users SET habitID = ? WHERE ID = ?");
    if (!$stmtUpdate) {
        echo json_encode(["code" => 500, "message" => "Prepare failed: " . $conn->error]);
        exit;
    }

    $stmtUpdate->bind_param("ii", $habitID, $userID);

    if ($stmtUpdate->execute()) {
        echo json_encode(["code" => 200, "message" => "Habit updated"]);
    } else {
        echo json_encode(["code" => 500, "message" => "Update failed: " . $stmtUpdate->error]);
    }

    $stmtUpdate->close();
} else {
    echo json_encode(["code" => 404, "message" => "Missing userID or habitID"]);
}
