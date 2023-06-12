<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database/database.php");
class ReaderProducts {
    public static function getAll() {
        return Database::query("SELECT * FROM products");
    }
    public static function parsePhotos($photos) {
        return array_diff(explode("\n", $photos), [""]);
    }
    public static function getByIdParent($id) {
        return Database::query("SELECT * FROM products WHERE id_parent = $id");
    }
}
?>