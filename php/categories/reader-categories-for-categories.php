<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database/database.php");
class ReaderCategoriesForCategories {
    public static function getByIdParent($id) {
        return Database::query("SELECT * FROM categories_for_categories WHERE id_parent = $id");
    }
}
?>