<?php
session_start();

if ($_POST['sign_out']) {
    session_unset();
    // destroy the session
    session_destroy();
}
header('Location: /lec6/end/admin/');
die();
