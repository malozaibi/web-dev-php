<?php
require_once('core/functions.php');

// echo date('Y M d h:i');


$conn = getConnection();

$sql = "SELECT * FROM blogs WHERE id = :id LIMIT 1";
$stmt = $conn->prepare($sql);
// Bind the ID parameter
$id = 1;
$stmt->bindParam(':id', $id);
$stmt->execute();
// Fetch the row
$row = $stmt->fetch();

echo json_encode($row);
