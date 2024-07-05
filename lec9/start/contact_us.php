<?php require_once('_partial/header.php') ?>
<?php require_once 'core/functions.php'; ?>

<?php
$successFlag = true;
$errors = []; // to collect errors here

$title = $_POST['title'] ?? null;
$email = $_POST['email'] ?? null;
$phone = $_POST['phone'] ?? null;
$age = $_POST['age'] ?? null;
$message = $_POST['message'] ?? null;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // trim remove white space from beginning and end of string
    $title = htmlspecialchars(trim($title), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($phone), ENT_QUOTES, 'UTF-8');
    $age = filter_var(trim($age), FILTER_SANITIZE_NUMBER_INT);
    $message = htmlspecialchars(trim($message), ENT_QUOTES, 'UTF-8');

    // Validate fields
    if (!$title) { // empty
        $errors['title'] = 'title is required';
    }

    // present and not valid format
    if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email is invalid';
    }

    // present and not matching pattern
    if ($phone && !preg_match('/^7[0-9]{8}$/', $phone)) {
        $errors['phone'] = 'Phone must be yemeni like 700000000';
    }

    if ($age && $age < 18) { // present and less that 18
        $errors['age'] = 'You are young to send message';
    }

    if (!$message) { // empty
        $errors['message'] = 'message is required';
    }

    if (count($errors) > 0) {
        $successFlag = false;
    }
}

if ($successFlag) {
    // add to database
}
?>
<main class="px-md-4 mt-5">
    <div class="col-md-6 mx-auto">
        <form action="" method="post">
            <h1 class="h3 mb-3 fw-normal">Contact Us</h1>

            <div class="mb-2">
                <label for="floatingInput">subject <span class="text-danger">*</span></label>
                <input type="text" required minlength="10" maxlength="50" class="form-control" name="title" id="floatingInput" value="<?= $_POST['title'] ?? '' ?>" />
                <?php if ($errors['title'] ?? false) : ?>
                    <span class="text-danger"> <?= $errors['title'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <div class="mb-2">
                <label for="floatingInput2">email</label>
                <input type="email" class="form-control" name="email" id="floatingInput2" value="<?= $_POST['email'] ?? '' ?>" />
                <?php if ($errors['email'] ?? false) : ?>
                    <span class="text-danger"> <?= $errors['email'] ?></span>
                <?php endif; ?>
            </div>

            <div class="mb-2">
                <label for="floatingInput3">phone</label>
                <input type="text" pattern="[7][0-9]{8}" class="form-control" name="phone" id="floatingInput3" value="<?= $_POST['phone'] ?? '' ?>" />
                <p>9 digits yemeni number</p>
                <?php if ($errors['phone'] ?? false) : ?>
                    <span class="text-danger"> <?= $errors['phone'] ?></span>
                <?php endif; ?>
            </div>

            <div class="mb-2">
                <label for="floatingInput4">age</label>
                <input type="number" min="18" class="form-control" name="age" id="floatingInput4" value="<?= $_POST['age'] ?? '' ?>" />
                <?php if ($errors['age'] ?? false) : ?>
                    <span class="text-danger"> <?= $errors['age'] ?></span>
                <?php endif; ?>
            </div>

            <div class="mb-2">
                <label for="textarea_input">Message <span class="text-danger">*</span></label>
                <textarea class="form-control" required minlength="100" maxlength="500" name="message" id="textarea_input"><?= $_POST['message'] ?? '' ?></textarea>
                <?php if ($errors['message'] ?? false) : ?>
                    <span class="text-danger"> <?= $errors['message'] ?></span>
                <?php endif; ?>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">
                Send
            </button>

            <?php if ($successFlag) : ?>
                <div class="alert alert-success"> <?= 'Thank you' ?></div>
            <?php else : ?>
                <div class="alert alert-danger"> <?= 'Error' ?></div>
            <?php endif; ?>
        </form>

        <?php
        echo '<b>title</b><br>';
        echo $title;
        echo '<br>';
        echo '<b>email</b><br>';
        echo $email;
        echo '<br>';
        echo '<b>phone</b><br>';
        echo $phone;
        echo '<br>';
        echo '<b>age</b><br>';
        echo $age;
        echo '<br>';
        echo '<b>message</b><br>';
        echo $message;
        echo '<br>';
        ?>
    </div>
</main>

<?php require_once('_partial/footer.php') ?>