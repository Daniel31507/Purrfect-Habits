<?php
session_start();

header('Content-Type: application/json');

if (isset($_SESSION['userId'])) {
    $response = [
        'loggedIn' => true,
        'userId' => $_SESSION['userId']
    ];
} else {
    $response = [
        'loggedIn' => false,
        'message' => 'Kein Benutzer angemeldet.'
    ];
}

echo json_encode($response);
?>
