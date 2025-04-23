<?php
session_start();
header('Content-Type: application/json');

$answer = array(
    'loggedIn' => false,
    'message' => 'Kein Benutzer angemeldet.'
);

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];

    $userData = json_decode(file_get_contents("../data/users.json"), true);
    $habitData = json_decode(file_get_contents("../data/habits.json"), true);

    foreach ($userData['users'] as $user) {
        if ($user['id'] == $userId) {
            $answer = array(
                'loggedIn' => true,
                'userId' => $userId,
                'habitIds' => $user['habits']
            );

            // Optional: Vollständige Habit-Daten anhängen
            $userHabits = [];
            foreach ($user['habits'] as $id) {
                foreach ($habitData['habits'] as $habit) {
                    if ($habit['id'] == $id) {
                        $userHabits[] = $habit;
                        break;
                    }
                }
            }

            $answer['habits'] = $userHabits;
            break;
        }
    }
}

echo json_encode($answer);
?>
