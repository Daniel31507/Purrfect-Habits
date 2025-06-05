<?php 
require 'mySQL.php';

$eintrag24h = false;

if (isset($_POST['userID'])) {
    $userID = intval($_POST['userID']);

    $stmt = $conn->prepare("SELECT created_at FROM users_notes WHERE userID = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    $now = new DateTime();
    while ($row = $result->fetch_assoc()) {
        $createdAt = new DateTime($row['created_at']);
        if ($createdAt > $now->sub(new DateInterval('P1D'))) {
            $eintrag24h = true;
            break;
        }
    }
    $stmt->close();
}

header('Content-Type: application/javascript');
echo 'var eintragHeute = ' . ($eintrag24h ? 'true' : 'false') . ';';
?>
