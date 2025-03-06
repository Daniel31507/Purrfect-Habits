<?php

$answer = array(
    "code" => 404,
    "habits" => []
);

$data = file_get_contents("../data/habits.json");
$library = json_decode($data);

if (isset($library->habits)) {
    foreach ($library->habits as $habit) {    
        $answer["code"] = 200;
        array_push($answer["habits"], $habit);
    }
}

echo json_encode($answer, JSON_PRETTY_PRINT);
?>
