<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database.php");
class ProductsPhotos extends Database {
    public function __construct($id_product) {
        parent::__construct();
        $this->id_product = $id_product;
    }
    public function add() {
        $photos = "";
    }
    public function delete() {}
    public function makeMajor() {}
    public function deleteAll() {}
    public function moveLeft() {}
    public function moveRight() {}
    public function count() {}
    public function get() {}
    public function getMajor() {
        return "/images/photo.png";
    }
    public function getAll() {}
    private function setPhotos($photos) {
        $this->pdo->query("UPDATE products SET photos = '$photos'");
    }
}
?>