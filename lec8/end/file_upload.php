<?php require_once('_partial/header.php') ?>
<?php require_once 'core/functions.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the file was uploaded without errors
    if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
        $fileTmpPath = $_FILES['document']['tmp_name'];
        $fileName = $_FILES['document']['name'];
        $fileSize = $_FILES['document']['size'];
        $fileType = $_FILES['document']['type'];
        $fileNameCmps = explode(".", $fileName); // split string to array
        $fileExtension = strtolower(end($fileNameCmps));

        // Specify the allowed file extensions
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'txt', 'pdf');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Directory where the file will be moved
            $uploadFileDir = 'uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                echo "File is successfully uploaded.";
            } else {
                echo "There was an error moving the uploaded file.";
            }
        } else {
            echo "Upload failed. Allowed file types: " . implode(',', $allowedfileExtensions);
        }
    } else {
        echo "Error: " . $_FILES['document']['error'];
    }
}

?>
<main class="px-md-4 mt-5">
    <div class="col-md-6 mx-auto">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="document">
            <input type="submit" value="Upload Document">
        </form>

    </div>
    <img width="150" src="/lec8/end/<?= $dest_path ?>" alt="">
    <a href="/lec8/end/<?= $dest_path ?>" download="">Download</a>
    <br>
    <?php
    echo '$fileTmpPath: ' . $fileTmpPath . '<br>';
    echo '$fileName: ' . $fileName . '<br>';
    echo '$fileSize: ' . $fileSize . '<br>';
    echo '$fileType: ' . $fileType . '<br>';
    echo '$fileExtension: ' . $fileExtension . '<br>';
    echo 'saved file path:' . $dest_path;
    ?>
</main>

<?php require_once('_partial/footer.php') ?>