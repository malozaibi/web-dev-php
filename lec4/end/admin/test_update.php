<?php
require_once '../core/functions.php';

$title = $_POST['title'] ?? '';
$body = $_POST['body'] ?? '';
$id = $_GET['id'] ?? null;
$successFlag = false;
if ($title && $body) {
    $conn = getConnection();
    try {
        if ($id) {
            $stmt = $conn->prepare("UPDATE blogs SET title = :title, body = :body WHERE id = :id");
            $stmt->bindParam(':id', $id);
        } else {
            $stmt = $conn->prepare("INSERT INTO blogs (title, body) VALUES (:title, :body)");
        }

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':body', $body);
        $stmt->execute();

        $successFlag = true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
if ($id) {
    $conn = getConnection();
    $sql = "SELECT * FROM blogs WHERE id = :id LIMIT 1";
    $stmt = $conn->prepare($sql);
    // Bind the ID parameter
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    // Fetch the row
    $row = $stmt->fetch(); // if no row return false
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $id ? "Update (#$id)" : 'Add' ?> Blog</title>

</head>

<body>
    <form action="" method="post">
        title
        <input type="text" name="title" value="<?= $id ? $row['title'] : '' ?>" />
        <br />
        body
        <textarea name="body"><?= $id  ? $row['body'] : '' ?></textarea>
        <br>
        <button><?= $id ? 'Update' : 'Add' ?></button>
    </form>
</body>

</html>