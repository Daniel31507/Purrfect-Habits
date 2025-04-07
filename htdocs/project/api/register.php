<?php
session_start();

$file_path = "../data/users.json";

$answer = array(
    "code" => 404,
    "message" => "Already registered"
);

if (isset($_POST["user"]) && isset($_POST["password"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];

    if (!file_exists($file_path)) {
        file_put_contents($file_path, json_encode(["users" => []]));
    }

    $data = file_get_contents($file_path);
    $users = json_decode($data, true);

    if (!isset($users['users'])) {
        $users['users'] = [];
    }

    $userExists = false;

    foreach ($users['users'] as $currentUser) {
        if ($currentUser['name'] == $user) {
            $userExists = true;
            break;
        }
    }

    if (!$userExists) {
        $highestId = 0;
        foreach ($users['users'] as $currentUser) {
            if (isset($currentUser['id']) && $currentUser['id'] > $highestId) {
                $highestId = $currentUser['id'];
            }
        }

        $newUserId = $highestId + 1;
        $_SESSION['userId'] = $newUserId;

        $users['users'][] = array(
            "id" => $newUserId,
            "name" => $user,
            "pwd" => $password,
            "habits" => []
        );

        file_put_contents($file_path, json_encode($users, JSON_PRETTY_PRINT));

        $answer = array(
            "code" => 200,
            "message" => "User registered successfully",
            "userId" => $_SESSION['userId']
        );
    }
}

echo json_encode($answer);
?>
