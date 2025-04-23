<?php 
session_start();

$answer = array(
    "code" => 404,
    "message" => "Not saved"
);

if (isset($_POST['userID']) && isset($_POST['habitID'])) {
    $userID = intval($_POST['userID']);
    $habitID = intval($_POST['habitID']);

    // Datei einlesen
    $data = file_get_contents("../data/users.json");
    $decoded = json_decode($data);

    // Fehler bei JSON prüfen
    if ($decoded === null || !isset($decoded->users)) {
        $answer["code"] = 500;
        $answer["message"] = "Invalid JSON structure";
    } else {
        $users = $decoded->users;

        // Benutzer finden
        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]->id == $userID) {

                // Stelle sicher, dass habits ein Array ist
                if (!isset($users[$i]->habits) || !is_array($users[$i]->habits)) {
                    $users[$i]->habits = [];
                }

                // Duplikate verhindern
                if (!in_array($habitID, $users[$i]->habits)) {
                    $users[$i]->habits[] = $habitID;

                    // Änderungen zurückspeichern
                    $decoded->users = $users;
                    file_put_contents("../data/users.json", json_encode($decoded, JSON_PRETTY_PRINT));
                    $answer["code"] = 200;
                    $answer["message"] = "Saved";
                } else {
                    $answer["code"] = 202;
                    $answer["message"] = "Already exists";
                }

                break;
            }
        }
    }
}

echo json_encode($answer);
?>
