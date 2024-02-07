<?php require_once('_partial/header.php') ?>
<?php require_once '../core/functions.php'; ?>

<?php
$id = $_POST['id'] ?? null;
if ($id) {
    $conn = getConnection();

    try {
        $sql = "DELETE FROM blogs WHERE id=$id";

        $conn->exec($sql);
        echo "Record deleted successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
?>

<?php require_once('_partial/footer.php') ?>