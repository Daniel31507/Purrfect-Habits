<?php
require 'mySQL.php';


if (isset($_GET['userID'])) {
    $userID = intval($_GET['userID']);

    $stmt = $conn->prepare("
        SELECT habits.name 
        FROM habits 
        JOIN users ON habits.ID = users.habitID 
        WHERE users.ID = ?
    ");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode([
            "habitName" => $row['name'],
            "code" => 200
        ]);
    } else {
        echo json_encode([
            "error" => "Kein Habit für userID $userID gefunden.",
            "code" => 404
        ]);
    }

    $stmt->close();
} else {
    echo json_encode([
        "error" => "userID fehlt oder ungültige Anfrage.",
        "code" => 400
    ]);
}
?>
