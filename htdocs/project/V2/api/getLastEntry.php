<?php
require 'mySQL.php';

if (isset($_GET['userID'])) {
    $userID = intval($_GET['userID']);

    // Hole maximal 7 letzte Eintragsdaten (unabhängig vom Alter)
    $stmt = $conn->prepare("SELECT DATE(created_at) as entryDate 
                            FROM users_notes 
                            WHERE userID = ? 
                            GROUP BY DATE(created_at)
                            ORDER BY entryDate DESC
                            LIMIT 7");
    $stmt->bind_param("i", $userID);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        $dates = [];
        while ($row = $result->fetch_assoc()) {
            $dates[] = $row['entryDate'];
        }

        if (count($dates) > 0) {
            echo json_encode(["code" => 200, "entryDates" => $dates]);
        } else {
            echo json_encode(["code" => 404, "message" => "Keine Einträge gefunden"]);
        }
    } else {
        echo json_encode(["code" => 500, "error" => $stmt->error]);
    }
}
?>
