<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database/database.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/categories/reader-categories-for-categories.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/categories/reader-categories-for-products.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
class Categories {
    public static function getProductsByIdParent($id) {
        return array_reverse(ReaderProducts::getByIdParent($id));
    }
    public static function isCategoryRoot($id) {
        $category = Database::query("SELECT * FROM categories_root WHERE id = $id");
        if ($category === []) {
            return false;
        }
        return true;
    }
    public static function getIdParentById($id) {
        $category_for_categories = Database::query("SELECT * FROM categories_for_categories WHERE id = $id");
        $category_for_products = Database::query("SELECT * FROM categories_for_products WHERE id = $id");
        if (isset($category_for_categories[0]["id_parent"])) {
            return $category_for_categories[0]["id_parent"];
        }
        if (isset($category_for_products[0]["id_parent"])) {
            return $category_for_products[0]["id_parent"];
        }
    }
    public static function getById($id) {
        $category_for_categories = Database::$pdo->query("SELECT * FROM categories_for_categories WHERE id = $id")->fetch();
        $category_for_products = Database::$pdo->query("SELECT * FROM categories_for_products WHERE id = $id")->fetch();
        $category_root = Database::$pdo->query("SELECT * FROM categories_root WHERE id = $id")->fetch();
        if ($category_for_categories) {
            return $category_for_categories;
        }
        if ($category_for_products) {
            return $category_for_products;
        }
        if ($category_root) {
            return $category_root;
        }
    }
}
?>