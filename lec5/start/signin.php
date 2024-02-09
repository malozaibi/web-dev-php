<?php require_once('_partial/header.php') ?>
<?php require_once('core/functions.php') ?>

<?php
$conn = getConnection();

$user_email = $_POST['user_email'] ?? '';
$pw = $_POST['pw'] ?? '';
$user = null;
if ($user_email && $pw) {

  $sql = "SELECT * FROM users WHERE email = :email and password = :password LIMIT 1";
  $stmt = $conn->prepare($sql);
  // Bind the ID parameter
  $stmt->bindParam(':email', $user_email);
  $stmt->bindParam(':password', $pw);
  $stmt->execute();
  // Fetch the row
  $user = $stmt->fetch(); // if no row return false
}

?>

<main class="form-signin w-100 m-auto mt-5">
  <div class="col-md-6 mx-auto">
    <?php if ($user) {
      echo "<h1>" . $user['name'] . " </h1>";
    } ?>
    <form action="" method="post">
      <h1 class="h3 mb-3 fw-normal">Welcome Back</h1>
      <div class="form-floating mb-2">
        <input type="email" class="form-control" name="user_email" id="floatingInput" />
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating mb-2">
        <input type="password" class="form-control" name="pw" id="floatingPassword" />
        <label for="floatingPassword">Password</label>
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit">
        Sign in
      </button>
    </form>
  </div>
</main>

<?php require_once('_partial/footer.php') ?>