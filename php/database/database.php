<?php
class Database {
    private static $host = "localhost";
    private static $dbname = "shop";
    private static $user = "root";
    private static $pass = "";
    protected static $pdo;
    protected static function init() {
        $host = self::$host;
        $dbname = self::$dbname;
        $dsn = "mysql:host=$host;dbname=$dbname";
        self::$pdo = new PDO($dsn, self::$user, self::$pass);
    }
}
?>