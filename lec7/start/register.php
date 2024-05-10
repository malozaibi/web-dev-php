<?php
// session_start();
?>
<?php require_once('_partial/header.php') ?>
<?php require_once('core/functions.php') ?>

<?php

$fullname = $_POST['fullname'] ?? '';
$user_email = $_POST['user_email'] ?? '';
$pw = $_POST['pw'] ?? '';
$successFlag = false;
if ($fullname && $user_email && $pw) {
  $conn = getConnection();
  try {

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");


    $stmt->bindParam(':name', $fullname);
    $stmt->bindParam(':email', $user_email);
    $stmt->bindParam(':password', $pw);
    $stmt->execute();

    $successFlag = true;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

?>
<main class="form-signin w-100 m-auto mt-5">
  <div class="col-md-6 mx-auto">
    <form action="" method="post">
      <h1 class="h3 mb-3 fw-normal">Please Register</h1>

      <div class="form-floating mb-2">
        <input type="text" class="form-control" name="fullname" id="floatingInput1" />
        <label for="floatingInput1">Full Name</label>
      </div>
      <div class="form-floating mb-2">
        <input type="email" class="form-control" name="user_email" id="floatingInput" />
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating mb-2">
        <input type="password" class="form-control" name="pw" id="floatingPassword" />
        <label for="floatingPassword">Password</label>
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit">
        Register
      </button>

      <?php if ($successFlag) : ?>
        <div class="alert alert-success"> <?= 'Registered' ?></div>
      <?php endif; ?>
    </form>
  </div>
</main>

<?php require_once('_partial/footer.php') ?>