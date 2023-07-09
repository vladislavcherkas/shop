<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database/database.php");
class EditorProducts {
    public static function delete($id) {
        Database::query("DELETE FROM products WHERE id = $id");
    }
    public static function create() {
        $id = self::findFreeId();
        Database::query("INSERT INTO products
                (id_parent, id, photos, title, existence, price, description, feature)
                VALUES (1, $id, '', '', '', '', '', '')");
    }
    public static function findFreeId() {
        $list_products = Database::query("SELECT * FROM products");
        for ($id_free = 1; true; $id_free++) {
            $exist_id = false;
            foreach ($list_products as $product) {
                if ($id_free === $product["id"]) {
                    $exist_id = true;
                }
            }
            if (!$exist_id) {
                return $id_free;
            }
        }
    }
    public static function getUniqueNamePhoto($type) {
        $extention = explode("/", $type)[1];
        $exist_names = scandir($_SERVER["DOCUMENT_ROOT"] . "/images/products/");
        for ($name = 1; true; $name++) {
            $name_free = "$name.$extention";
            if (!in_array($name_free, $exist_names)) {
                return $name_free;
            }
        }
    }
    public static function addPhoto($id, $photo) {
        $photo_parse = explode("/", $photo);
        $photo = end($photo_parse);
        $string_photos = Database::query("SELECT photos FROM products
                WHERE id = $id")[0]["photos"];
        $array_photos = explode(" ", $string_photos);
        $array_photos[] = $photo;
        $string_photos_updated = trim(implode(" ", $array_photos));
        Database::query("UPDATE products SET photos = '$string_photos_updated'
                WHERE id = $id");
    }
    public static function deletePhotoByName($product_id, $name) {
        $photos = ReaderProducts::getParsedPhotosById($product_id);
        $name_id = array_search($name, $photos);
        unset($photos[$name_id]);
        $photos_updated = ReaderProducts::implodePhotos($photos);
        Database::query("UPDATE products SET photos = '$photos_updated'
                WHERE id = $product_id");
    }
    public static function setMainPhotoByName($product_id, $name) {
        $photos = ReaderProducts::getParsedPhotosById($product_id);
        $name_id = array_search($name, $photos);
        // swap
        $remain_value = $photos[0];
        $photos[0] = $photos[$name_id];
        $photos[$name_id] = $remain_value;

        $photos_updated = ReaderProducts::implodePhotos($photos);
        Database::query("UPDATE products SET photos = '$photos_updated'
                WHERE id = $product_id");
    }
}
?>