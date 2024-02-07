<?php

function getConnection()
{

    $servername = "localhost"; // or "127.0.0.1"
    $db         = 'my_project';
    $username   = "root";
    $password   = "";

    $connString = "mysql:host=$servername;dbname=$db;";
    // start connection
    try {
        $conn = new PDO($connString, $username, $password);
        // set the PDO error mode to exception (we see errors)
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully<br>";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . '<br>';
    }

    return $conn;
}
$conn = getConnection();
// sql commands

$data = $conn->query("SELECT * FROM blogs")->fetchAll();

foreach ($data as $row) {
    echo '<br><br><br>';
    echo $row['title'] . "<br>";
    echo $row['body'] . "<br>";
    echo $row['created_at'] . "<br />";
    echo '<br><br><br>';
}
