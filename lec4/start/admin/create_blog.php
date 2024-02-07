<?php require_once('_partial/header.php') ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
  <div class="col-md-6 mx-auto">
    <form action="" method="post">
      <h1 class="h3 mb-3 fw-normal">Create Blog</h1>

      <div class=" mb-2">
        <label for="floatingInput">title</label>
        <input type="text" class="form-control" name="title" id="floatingInput" />
      </div>
      <div class="mb-2">
        <label for="textarea_input">Body</label>
        <textarea class="form-control" name="body" id="textarea_input"></textarea>
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit">
        ADD
      </button>
    </form>
  </div>
</main>

<?php require_once('_partial/footer.php') ?>