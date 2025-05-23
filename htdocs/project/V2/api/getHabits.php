<?php 

require 'mySQL.php';

if (isset($_GET['habitID'])) {
    $habitID = intval($_GET['habitID']);
    $stmt = $conn->prepare("SELECT * FROM habits WHERE id = ?");
    $stmt->bind_param("i", $habitID);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();

    if ($data) {
        $answer = ["habits" => $data, "code" => 200];
    } else {
        $answer = ["error" => "Habit mit ID $habitID nicht gefunden."];
    }
} else {
    $result = $conn->query("SELECT * FROM habits");
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $answer = ["habits" => $data, "code" => 200];

}

echo json_encode($answer);

?>
