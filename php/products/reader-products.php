<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database/database.php");
class ReaderProducts {
    public static function getAll() {
        return Database::query("SELECT * FROM products");
    }
    public static function getById($id) {
        return Database::query("SELECT * FROM products WHERE id = $id")[0];
    }
    public static function getTitleById($id) {
        return self::getById($id)["title"];
    }
    public static function getPriceById($id) {
        return self::getById($id)["price"];
    }
    public static function getExistenceById($id) {
        return self::getById($id)["existence"];
    }
    public static function getPhotosById($id) {
        return self::getById($id)["photos"];
    }
    public static function getFeaturesById($id) {
        return self::getById($id)["feature"];
    }
    public static function getParsedPhotosById($id) {
        return self::parsePhotos(self::getPhotosById($id));
    }
    public static function parsePhotos($photos) {
        return array_diff(explode(" ", $photos), [""]);
    }
    public static function implodePhotos($array) {
        return implode(" ", array_diff($array, [""]));
    }
    public static function getByIdParent($id) {
        return Database::query("SELECT * FROM products WHERE id_parent = $id");
    }
}
?>