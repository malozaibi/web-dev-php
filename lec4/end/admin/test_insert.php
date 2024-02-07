<?php
require_once '../core/functions.php';

$title = $_POST['title'] ?? '';
$body = $_POST['body'] ?? '';

$successFlag = false;
if ($title && $body) {
    $conn = getConnection();
    try {
        // wrong way (sql injection bug)
        // $sql = "INSERT INTO blogs (title, body) VALUES ('$title', '$body')";
        // $conn->exec($sql);
        // The Best and Recommended Way
        $stmt = $conn->prepare("INSERT INTO blogs (title, body) VALUES (:title, :body)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':body', $body);
        $stmt->execute();

        $successFlag = true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Blog</title>

</head>

<body>
    <form action="" method="post">
        title
        <input type="text" name="title" value="" />
        <br />
        body
        <textarea name="body"></textarea>
        <br>
        <button>Add</button>
    </form>
</body>

</html>