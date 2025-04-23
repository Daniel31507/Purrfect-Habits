<?php
$file_path = "../data/mappe.json";

$answer = array(
    "code" => 400,
    "message" => "No note provided"
);

if (isset($_POST["note"])) {
    $note = $_POST["note"];

    // Falls Datei nicht existiert, leeres Array erstellen
    if (!file_exists($file_path)) {
        file_put_contents($file_path, json_encode(["notes" => []]));
    }

    // Vorhandene Notizen laden
    $data = file_get_contents($file_path);
    $notesData = json_decode($data, true);

    if (!isset($notesData["notes"])) {
        $notesData["notes"] = [];
    }

    // Neue Notiz hinzufügen
    $notesData["notes"][] = $note;

    // Zurückschreiben
    file_put_contents($file_path, json_encode($notesData, JSON_PRETTY_PRINT));

    $answer = array(
        "code" => 200,
        "message" => "Note saved successfully"
    );
}

echo json_encode($answer);
?>
