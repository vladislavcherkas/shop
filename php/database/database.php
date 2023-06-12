<?php
class Database {
    public static $host = "localhost";
    public static $dbname = "shop";
    public static $user = "root";
    public static $password = "";
    public static $pdo;
    public static function init() {
        $host = self::$host;
        $dbname = self::$dbname;
        $user = self::$user;
        $password = self::$password;
        $dsn = "mysql:host=$host;dbname=$dbname";
        self::$pdo = new PDO($dsn, $user, $password);
    }
    public static function query($query) {
        return self::$pdo->query($query)->fetchAll();
    }
}
Database::init();
?>