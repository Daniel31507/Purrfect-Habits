<?php 

require 'mySQL.php';

if (isset($_GET['habitID'])) {
    $habitID = intval($_GET['habitID']);
    $stmt = $conn->prepare("SELECT note FROM habits_tips WHERE habitID = ?");
    $stmt->bind_param("i", $habitID);
    $stmt->execute();
    $result = $stmt->get_result();

    $notes = [];
    while ($row = $result->fetch_assoc()) {
        $notes[] = $row['note'];
    }
    $stmt->close();

    if (!empty($notes)) {
        $answer = ["tips" => $notes, "code" => 200];
    } else {
        $answer = ["error" => "Keine Tipps für habitID $habitID gefunden."];
    }
} else {
    $answer = ["error" => "habitID nicht übergeben."];
}

echo json_encode($answer);

?>
