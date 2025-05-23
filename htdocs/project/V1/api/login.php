<?php
session_start(); 



$answer = array(
    "code" => 404,
    "message" => "Not logged in",
    "hasHabit" => false
);

if (isset($_POST["user"]) && isset($_POST["password"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];

    $data = file_get_contents("../data/users.json");
    $users = json_decode($data, true);

    foreach ($users['users'] as $currentUser) {
        if ($currentUser['name'] == $user && $currentUser['pwd'] == $password) {
            $_SESSION['userId'] = $currentUser['id'];

            if($currentUser['habits'] != null) {
                $answer = array(
                    "code" => 200,
                    "message" => "Logged in successfully",
                    "userId" => $_SESSION['userId'],
                    "hasHabit" => true
                );
            } else {
                $answer = array(
                    "code" => 200,
                    "message" => "Logged in successfully",
                    "userId" => $_SESSION['userId'],
                    "hasHabit" => false
                );
            }
            break;
        }
    }
}

echo json_encode($answer);
?>
