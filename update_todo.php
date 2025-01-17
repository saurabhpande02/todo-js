<?php
header('Content-Type: application/json');
include 'connect.php';

$data = json_decode(file_get_contents("php://input"), true);

if(isset($data['id']) && isset($data['status'])) {
    $id = intval($data['id']);
    $status = $data['status'] ? 1 : 0;
    $sql = "UPDATE todos SET status = $status WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid input"]);
}

$conn->close();
?>
