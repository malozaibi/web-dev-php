<?php require_once('_partial/header.php') ?>

<main class="form-signin w-100 m-auto mt-5">
  <div class="col-md-6 mx-auto">
    <form action="" method="post">
      <h1 class="h3 mb-3 fw-normal">Please Register</h1>

      <div class="form-floating mb-2">
        <input type="text" class="form-control" name="fullname" id="floatingInput" />
        <label for="floatingInput">Full Name</label>
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
    </form>
  </div>
  <div class="col-md-6 mx-auto fs-3">
    <pre>

      <?php

      echo '<br>post: full name: ' .  '<b>' . ($_POST['fullname'] ?? 'not set') . '</b>';
      echo ' post: email: ' . '<b>' . ($_POST['user_email'] ?? 'not set') . '</b>';
      echo ' post: password: ' . '<b>' . ($_POST['pw'] ?? 'not set') . '</b>';
      // echo '<br>';
      // echo 'get: full name: ' .  ($_GET['fullname'] ?? 'not set');
      // echo ' get: email: ' . ($_GET['user_email'] ?? 'not set');
      // echo ' get: password: ' . ($_GET['pw'] ?? 'not set');
      ?>

      </pre>
  </div>
</main>

<?php require_once('_partial/footer.php') ?>