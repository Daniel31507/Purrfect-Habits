<?php 
session_start();

$answer = array(
    "code" => 404,
    "message" => "Not saved"
);

if (isset($_POST['userID']) && isset($_POST['habitID'])) {
    $userID = intval($_POST['userID']);
    $habitID = intval($_POST['habitID']);

    $data = file_get_contents("../data/users.json");
    $library = json_decode($data, true);

    foreach ($library['users'] as &$user) {
        if ($user['id'] === $userID) {
            if (!in_array($habitID, $user['habits'])) {
                $user['habits'][] = $habitID;
                $answer["code"] = 200;
                $answer["message"] = "Habit saved successfully";


                file_put_contents("../data/users.json", json_encode($library, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            } else {
                $answer["code"] = 200;
                $answer["message"] = "Habit already saved";
            }

            break;
        }
    }
} 

echo json_encode($answer);
?>
