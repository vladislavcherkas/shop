<?php
class Database {
    private $host = "localhost";
    private $dbname = "shop";
    private $user = "root";
    private $pass = "";
    protected $pdo;
    protected function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        $this->pdo = new PDO($dsn, $this->user, $this->pass);
    }
}
?>