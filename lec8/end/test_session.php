<?php
session_start();
$_SESSION['key'] = 'value';
print_r($_SESSION);
