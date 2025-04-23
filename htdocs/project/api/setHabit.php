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
    $decoded = json_decode($data);

    if ($decoded === null || !isset($decoded->users)) {
        $answer["code"] = 500;
        $answer["message"] = "Invalid JSON structure";
    } else {
        $users = $decoded->users;

        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]->id == $userID) {

                if (!empty($users[$i]->habits) && is_array($users[$i]->habits)) {
                    $answer["code"] = 403;
                    $answer["message"] = "User already has a habit";
                    echo json_encode($answer);
                    exit;
                }

                $users[$i]->habits = [$habitID];
                $decoded->users = $users;

                file_put_contents("../data/users.json", json_encode($decoded, JSON_PRETTY_PRINT));
                $answer["code"] = 200;
                $answer["message"] = "Saved";
                break;
            }
        }
    }
}

echo json_encode($answer);
?>
