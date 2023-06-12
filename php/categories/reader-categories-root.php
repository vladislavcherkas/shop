<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/categories/categories.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/categories/reader-categories-for-categories.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database/database.php");
class ReaderCategoriesRoot {
    public static function getAll() {
        return Database::query("SELECT * FROM categories_root");
    }
    public static function get($id) {
        return Database::query("SELECT * FROM categories_root WHERE id = $id")[0];
    }
    public static function getByIdChild($id) {
        while (true) {
            if (Categories::isCategoryRoot($id)) {
                return self::get($id);
            }
            $id = Categories::getIdParentById($id);
        }
    }
}
?>