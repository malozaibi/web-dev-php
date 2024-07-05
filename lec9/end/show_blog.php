<?php require_once('core/functions.php') ?>
<?php require_once('_partial/header.php') ?>
<?php
$conn = getConnection();

$sql = "SELECT * FROM blogs WHERE id = :id LIMIT 1";
$stmt = $conn->prepare($sql);
// Bind the ID parameter
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
// Fetch the row
$row = $stmt->fetch(); // if no row return false

?>
<main>

  <div class="col-md-6 mx-auto mt-5">
    <?php if ($row) : ?>
      <time>
        <?= date('D, j F Y \a\t H:i', strtotime($row['created_at'])) ?>
      </time>
      <h1><?= $row['title'] ?></h1>
      <div><?= $row['body'] ?></div>

    <?php else : ?>
      <p>No Blog Post (this is wrong, but for now)</p>
    <?php endif; ?>
  </div>
</main>

<?php require_once('_partial/footer.php') ?>