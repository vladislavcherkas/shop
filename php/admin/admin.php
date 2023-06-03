<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database.php");
class Admin extends Database {
    public $name_table = "admins";
    public function __construct() {
        parent::__construct();
    }
    public function add($first_name, $last_name, $password) {
        if (!$this->exist($first_name, $last_name)) {
            $this->pdo->query("INSERT INTO $this->name_table
                (first_name, last_name, password)
                VALUES ('$first_name', '$last_name', '$password')");
        }
    }
    public function delete($first_name, $last_name) {
        $tihs->pdo->query("DELETE FROM $this->name_table
            WHERE first_name = '$first_name' and last_name = '$last_name'");
    }
    public functioN get($first_name, $last_name) {
        $admin = $this->pdo->query("SELECT * FROM $this->name_table 
            WHERE first_name = '$first_name'
            and last_name = '$last_name'")->fetch();
        return $admin;
    }
    public function edit($first_name, $last_name, $first_name_new,
            $last_name_new, $password_new) {
        $this->pdo->query("UPDATE $this->name_table
            SET first_name = '$first_name_new', last_name = '$last_name_new',
            password = '$password_new'");
    }
    public function getAll() {
        return $this->pdo->query("SELECT * FROM $this->name_table")->fetchAll();
    }
    public function login($first_name, $last_name, $password) {
        $response = $this->pdo->query("SELECT * FROM $this->name_table
            WHERE first_name = '$first_name' and last_name = '$last_name'
            and password = '$password'");
        if ($response->fetch() !== false) {
            return true;
        }
        return false;
    }
    public function exist($first_name, $last_name) {
        $response = $this->pdo->query("SELECT * FROM $this->name_table
            WHERE first_name = '$first_name' and last_name = '$last_name'");
        if ($response->fetch() !== false) {
            return true;
        }
        return false;
    }
}
?>