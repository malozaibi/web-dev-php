<?php
session_start();

$success_message = '';
$form_data = [
    'name' => '',
    'email' => '',
    'message' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form data
    $form_data['name'] = $_POST['name'];
    $form_data['email'] = $_POST['email'];
    $form_data['message'] = $_POST['message'];


    // Here you can validate and save the data, e.g., into a database
    // Assuming validation and saving are successful:
    $success = false;

    if ($success) {
        // Store success message and form data in the session
        $_SESSION['success_message'] = 'Form submitted successfully!';
    } else {
        $_SESSION['form_data'] = $form_data;
    }


    // Redirect to the same page to display the success message
    header('Location: .');
    exit();
}

if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

if (isset($_SESSION['form_data'])) {
    $form_data = $_SESSION['form_data'];
    unset($_SESSION['form_data']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PRG Example</title>
</head>

<body>
    <?php if ($success_message) : ?>
        <p style="color: green;"><?php echo htmlspecialchars($success_message); ?></p>
    <?php endif; ?>

    <form action="index.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($form_data['name']); ?>">
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($form_data['email']); ?>">
        <br>
        <label for="message">Message:</label>
        <textarea id="message" name="message"><?php echo htmlspecialchars($form_data['message']); ?></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>