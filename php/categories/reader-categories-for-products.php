<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database/database.php");
class ReaderCategoriesForProducts {
    public static function getByIdParent($id) {
        return Database::query("SELECT * FROM categories_for_products WHERE id_parent = $id");
    }
}
?>