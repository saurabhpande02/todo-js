<?php
header('Content-Type: application/json');
include 'connect.php';

$sql = "SELECT * FROM todos ORDER BY created_at DESC";
$result = $conn->query($sql);

$todos = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $todos[] = $row;
    }
}

echo json_encode($todos);
$conn->close();
?>
