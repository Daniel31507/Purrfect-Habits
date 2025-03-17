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
else if( isset($_GET["id"]) && filter_var($_GET["id"], FILTER_VALIDATE_INT) !== false && $_GET["id"] > 0 ) {
    $id = $_GET["id"];


    if($id <= count($library->habits)){
        $answer["code"] = 200;
        array_push($answer["habits"], $library->habits[$id - 1]);
    }
    
}

echo json_encode($answer);
?>
