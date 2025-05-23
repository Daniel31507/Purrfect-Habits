<?php
session_start();
if (!isset($_SESSION['userID'])) {
    $_SESSION['userID'] = 0;
}

$answer = array(
    "code" => 404,
);

require 'mySQL.php';

if (isset($_POST["user"]) && isset($_POST["password"]) && !isset($_POST['totalSpent'])) {
    $user = $_POST["user"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $answer["code"] = 300;
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $habitID = 0;
        $insert_stmt = $conn->prepare("INSERT INTO users (username, password, habitID) VALUES (?, ?, ?)");
        $insert_stmt->bind_param("ssi", $user, $hashed_password, $habitID);

        if ($insert_stmt->execute()) {
            $newUserID = $conn->insert_id;
            $_SESSION['userID'] = $newUserID;

            $answer['code'] = 200;
            $answer['userID'] = $newUserID;
        } else {
            $answer['code'] = 500;
            $answer['error'] = $insert_stmt->error;
        }

        $insert_stmt->close();
    }

    $stmt->close();
}

echo json_encode($answer);
?>
