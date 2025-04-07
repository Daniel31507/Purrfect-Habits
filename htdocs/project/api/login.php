<?php
session_start(); 


$answer = array(
    "code" => 404,
    "message" => "Not logged in"
);

if (isset($_POST["user"]) && isset($_POST["password"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];

    $data = file_get_contents("../data/users.json");
    $users = json_decode($data, true);

    foreach ($users['users'] as $currentUser) {
        if ($currentUser['name'] == $user && $currentUser['pwd'] == $password) {
            $answer = array(
                "code" => 200,
                "message" => "Logged in successfully"
            );
            $_SESSION['userId'] = $currentUser['id'];
            break;
        }
    }
}

echo json_encode($answer);

?>
