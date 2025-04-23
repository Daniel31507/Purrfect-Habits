<?php
session_start();


$answer = array(
    "code" => 404,
    "habits" => []
);

$data = file_get_contents("../data/habits.json");
$library = json_decode($data);

if (isset($_GET["id"]) && filter_var($_GET["id"], FILTER_VALIDATE_INT) !== false && $_GET["id"] > 0) {
    $id = $_GET["id"];

    if (isset($library->habits) && $id <= count($library->habits)) {
        $answer["code"] = 200;
        array_push($answer["habits"], $library->habits[$id - 1]);
    }
} elseif (isset($library->habits)) {
    $answer["code"] = 200;
    foreach ($library->habits as $habit) {
        array_push($answer["habits"], $habit);
    }
}


echo json_encode($answer);
?>
