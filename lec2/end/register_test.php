<?php

echo 'post: name: ' .  ($_POST['name'] ?? 'not set');
echo 'post: email: ' . ($_POST['email'] ?? 'not set');
echo 'post: password: ' . ($_POST['password'] ?? 'not set');
echo '<br>';
echo 'get: name: ' .  ($_GET['name'] ?? 'not set');
echo 'get: email: ' . ($_GET['email'] ?? 'not set');
echo 'get: password: ' . ($_GET['password'] ?? 'not set');
