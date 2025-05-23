<?php
session_start();

$file_path = "../data/mappe.json";

$answer = array(
    "code" => 400,
    "message" => "No note provided"
);

// Dummy user id, falls noch keine Session-Userid gesetzt ist (zum Testen)
if (!isset($_SESSION["userid"])) {
    $_SESSION["userid"] = 1;
}

$userid = $_SESSION["userid"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["note"])) {
        $note = trim($_POST["note"]);

        // Falls Datei nicht existiert, mit Grundstruktur anlegen
        if (!file_exists($file_path)) {
            file_put_contents($file_path, json_encode(["usernotes" => []], JSON_PRETTY_PRINT));
        }

        // Daten laden
        $data = file_get_contents($file_path);
        $notesData = json_decode($data, true);

        if (!isset($notesData["usernotes"])) {
            $notesData["usernotes"] = [];
        }

        // Suchen, ob der User schon vorhanden ist
        $userIndex = null;
        foreach ($notesData["usernotes"] as $index => $usernotes) {
            if (isset($usernotes["userid"]) && $usernotes["userid"] == $userid) {
                $userIndex = $index;
                break;
            }
        }

        if ($userIndex === null) {
            // User noch nicht vorhanden, neu anlegen
            $notesData["usernotes"][] = [
                "userid" => $userid,
                "notes" => [$note]
            ];
        } else {
            // User gefunden, Note hinzufügen
            if (!isset($notesData["usernotes"][$userIndex]["notes"])) {
                $notesData["usernotes"][$userIndex]["notes"] = [];
            }
            $notesData["usernotes"][$userIndex]["notes"][] = $note;
        }

        // Datei speichern
        file_put_contents($file_path, json_encode($notesData, JSON_PRETTY_PRINT));

        $answer = array(
            "code" => 200,
            "message" => "Note saved successfully"
        );
    }
} else if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (!file_exists($file_path)) {
        echo json_encode(["usernotes" => []]);
        exit;
    }

    $data = file_get_contents($file_path);
    $notesData = json_decode($data, true);

    if (!isset($notesData["usernotes"])) {
        $notesData["usernotes"] = [];
    }

    echo json_encode($notesData);
    exit;
}

echo json_encode($answer);
