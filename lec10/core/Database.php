<?php // core/Database.php
class Database
{
    private static $pdo;

    public static function connection()
    {
        if (!self::$pdo) {
            $dsn = 'mysql:host=localhost;dbname=my_project;charset=utf8mb4';
            self::$pdo = new PDO($dsn, 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }
        return self::$pdo;
    }
}
