<?php require_once('core/functions.php') ?>
<?php require_once('_partial/header.php') ?>
<?php
$conn = getConnection();
// sql commands

$data = $conn->query("SELECT * FROM blogs")->fetchAll();

?>
<main>
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"><?php echo strtoupper($siteName) ?></h1>
        <p class="lead text-body-secondary">
          Something short and leading about the collection below—its
          contents, the creator, etc. Make it short and sweet, but not too
          short so folks don’t simply skip over it entirely.
        </p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>
  </section>

  <div class="blog py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($data as $row) : ?>
          <div class="col">
            <div class="card shadow-sm h-100">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c"></rect>
                <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                  Thumbnail
                </text>
              </svg>
              <div class="card-body">
                <p class="card-title h4">
                  <?= $row['title'] ?>
                </p>
                <p class="card-text">
                  <?= $row['body'] ?>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="show_blog.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-secondary">
                      View
                    </a>
                    <a href="admin/create_edit_blog.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-secondary">
                      Edit
                    </a>
                  </div>
                  <small class="text-body-secondary">9 mins</small>
                </div>
              </div>
              <div class="card-footer">
                <time>
                  <?= date('D, j F Y \a\t H:i', strtotime($row['created_at'])) ?>
                </time>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</main>

<?php require_once('_partial/footer.php') ?>