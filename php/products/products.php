<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database.php");
class Products extends Database {
    public function __construct() {
        parent::__construct();
    }
    public function get($id) {
        $product = $this->pdo->query(
            "SELECT * FROM products WHERE id = $id")->fetch();
        return $product;
    }
    public function getAll() {
        $products = $this->pdo->query("SELECT * FROM products")->fetchAll();
        return $products;
    }
    public function create() {
        $id = $this->freeId();
        $this->pdo->query("INSERT INTO products (id, existence,
            photos, description, price, feature)
            VALUES ($id, 'В наличии', '/images/photo.png', 'Нет', 1, 'Нет')");
    }
    public function delete($id) {
        if ($this->exist($id)) {
            $this->pdo->query("DELETE FROM products WHERE id = $id");
        }
    }
    public function freeId() {
        for ($id = 1; true; $id++) {
            if (!$this->exist($id)) {
                break;
            }
        }
        return $id;
    }
    public function exist($id) {
        $query = $this->pdo->query("SELECT * FROM products WHERE id = $id");
        if ($query->fetch() === false) {
            return false;
        }
        return true;
    }
}
?>