<?php
header('Content-Type: application/json');
include 'connect.php';

$data = json_decode(file_get_contents("php://input"), true);

if(isset($data['id'])) {
    $id = intval($data['id']);
    $sql = "DELETE FROM todos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid ID"]);
}

$conn->close();
?>
