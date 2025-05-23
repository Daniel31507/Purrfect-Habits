<?php 

require "mySQL.php";


$awnser = [
    "code" => 404,
    "habitID" => -1
];


if(isset($_GET['uid'])) {
    $id = intval($_GET['uid']);

    $sql = "SELECT habitID FROM users WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $data = mysqli_fetch_all($stmt->get_result(), MYSQLI_ASSOC);

    $awnser["code"] = 200;
    $awnser["habitID"] = $data;
}


echo json_encode($awnser);
?>