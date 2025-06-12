<?php 
require 'mySQL.php';

if (isset($_POST['userID'])) {
    $userID = intval($_POST['userID']);

    $stmt = $conn->prepare("SELECT entry FROM users_notes WHERE userID = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    $entry = [];
    while ($row = $result->fetch_assoc()) {
        $entry[] = $row['entry'];
    }
    $stmt->close();

    if (!empty($entry)) {
        $answer = ["entry" => $entry, "code" => 200];
    } else {
        $answer = ["error" => "Keine Notes für userID $userID gefunden."];
    }
} else {
    $answer = ["error" => "userID nicht übergeben oder falsche Methode."];
}

echo json_encode($answer);
?>