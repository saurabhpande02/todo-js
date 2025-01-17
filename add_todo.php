<?php
header('Content-Type: application/json');
include 'connect.php';

$data = json_decode(file_get_contents("php://input"), true);

if(isset($data['task']) && !empty(trim($data['task']))) {
    $task = $conn->real_escape_string($data['task']);
    $sql = "INSERT INTO todos (task) VALUES ('$task')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true, "id" => $conn->insert_id]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid input"]);
}

$conn->close();
?>
