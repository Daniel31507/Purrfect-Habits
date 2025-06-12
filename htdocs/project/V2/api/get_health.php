<?php
require 'mySQL.php';

if (isset($_GET['userID'])) {
    $userID = intval($_GET['userID']);
    $today = date('Y-m-d');

    // Hole aktuelle Health + letzter Health-Update-Tag + letzter Eintrag
    $stmt = $conn->prepare("
        SELECT u.health, u.lastHealthUpdate, MAX(un.created_at) AS lastEntryDate
        FROM users u
        LEFT JOIN users_notes un ON u.ID = un.userID
        WHERE u.ID = ?
        GROUP BY u.ID, u.health, u.lastHealthUpdate
    ");
    $stmt->bind_param("i", $userID);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $health = intval($row['health']);
            $lastUpdate = $row['lastHealthUpdate'];
            $lastEntry = $row['lastEntryDate'];
            $bonus = false;

            if ($lastUpdate !== $today) {
                $now = new DateTime();
                $last = $lastEntry ? new DateTime($lastEntry) : null;
                $daysDiff = $last ? $now->diff($last)->days : PHP_INT_MAX;

                // Leben berechnen (reset oder Abzug)
                if ($daysDiff >= 8) {
                    $health = 0;
                } else {
                    $health = max(0, $health - $daysDiff);
                }

                // Bonusleben prüfen
                $bonusCheck = $conn->prepare("
                    SELECT COUNT(DISTINCT DATE(created_at)) AS streak
                    FROM users_notes
                    WHERE userID = ?
                    AND created_at >= DATE_SUB(NOW(), INTERVAL 3 DAY)
                ");
                $bonusCheck->bind_param("i", $userID);
                $bonusCheck->execute();
                $bonusRes = $bonusCheck->get_result();
                if ($bonusRow = $bonusRes->fetch_assoc()) {
                    if ($bonusRow['streak'] == 3) {
                        $health++;
                        $bonus = true;
                    }
                }

                // Begrenzung auf max. 8 Leben
                $health = min($health, 8);

                // Speichern: Health & Update-Datum
                $update = $conn->prepare("UPDATE users SET health = ?, lastHealthUpdate = ? WHERE ID = ?");
                $update->bind_param("isi", $health, $today, $userID);
                $update->execute();
            }

            echo json_encode([
                "code" => 200,
                "health" => $health,
                "lastEntry" => $lastEntry,
                "bonus" => $bonus
            ]);
        } else {
            echo json_encode(["code" => 404, "message" => "User nicht gefunden"]);
        }
    } else {
        echo json_encode(["code" => 500, "error" => $stmt->error]);
    }
}
?>
