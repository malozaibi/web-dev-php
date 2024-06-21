<?php require_once('_partial/header.php') ?>
<?php require_once '../core/functions.php'; ?>

<?php
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
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
  <div class="col-md-6 mx-auto">
    <form action="" method="post">
      <h1 class="h3 mb-3 fw-normal"><?= $id ? "Update (#$id)" : 'Create' ?> Blog</h1>

      <div class=" mb-2">
        <label for="floatingInput">title</label>
        <input type="text" class="form-control" name="title" id="floatingInput" value="<?= $id ? $row['title'] : '' ?>" />
      </div>
      <div class="mb-2">
        <label for="textarea_input">Body</label>
        <textarea class="form-control" name="body" id="textarea_input"><?= $id  ? $row['body'] : '' ?></textarea>
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit">
        <?= $id ? 'Update' : 'Add' ?>
      </button>

      <?php if ($successFlag) : ?>
        <div class="alert alert-success"> <?= $id ? 'Updated' : 'Added' ?></div>
      <?php endif; ?>
    </form>
    <?php if ($id && $_SESSION['user']['type'] == 'admin') : ?>
      <form action="destroy_blog.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button class="btn btn-danger py-2" type="submit">
          <?= 'Delete' ?>
        </button>
      </form>
    <?php endif; ?>
  </div>
</main>

<?php require_once('_partial/footer.php') ?>