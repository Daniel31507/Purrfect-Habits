<?php
session_start();

if(!isset($_SESSION['userID'])) {
    $_SESSION['userID'] = 0;
}

$answer = array("code" => 404);

require 'mySQL.php';

if (isset($_POST["user"]) && isset($_POST["password"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row["password"])) {
            $answer["code"] = 200;
            $answer["hasHabit"] = ($row["habitID"] != 0);
            $_SESSION['userID'] = $row["ID"];
        } else {
            $answer["code"] = 403;
        }
    } else {
        $answer["code"] = 405;
    }

    $stmt->close();
}

echo json_encode($answer);
?>
