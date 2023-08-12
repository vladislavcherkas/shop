<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database/database.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/settings/reader-settings.php");
class EditorProducts {
    public static function delete($id) {
        Database::query("DELETE FROM products WHERE id = $id");
    }
    public static function create() {
        $id = self::findFreeId();
        $features = ReaderSettings::get("Характеристики по умолчанию");
        Database::query("INSERT INTO products
                (id_parent, id, photos, title, existence, price, description, feature)
                VALUES (1, $id, '', '', '', '', '', '" . $features . "')");
    }
    public static function updateTitle($id, $title) {
        Database::query("UPDATE products SET title = '$title' WHERE id = $id");
    }
    public static function updateExistence($id, $existence) {
        Database::query("UPDATE products SET existence = '$existence' WHERE id = $id");
    }
    public static function updatePrice($id, $price) {
        Database::query("UPDATE products SET price = '$price' WHERE id = $id");
    }
    public static function updateDescription($id, $description) {
        Database::query("UPDATE products SET description = '$description' WHERE id = $id");
    }
    public static function updateFeatures($id, $features) {
        if ($features === "{}") {
            $features = ReaderSettings::get("Характеристики по умолчанию");
        }
        Database::query("UPDATE products SET feature = '$features' WHERE id = $id");
    }
    public static function findFreeId() {
        $list_products = Database::query("SELECT * FROM products");
        for ($id_free = 1; true; $id_free++) {
            $exist_id = false;
            foreach ($list_products as $product) {
                $id = intval($product["id"]);
                if ($id_free === $id) {
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
    public static function addFeature($id) {
        $features = json_decode(ReaderProducts::getFeaturesById($id), true);
        $features[""] = "";
        self::updateFeatures($id, json_encode($features, JSON_UNESCAPED_UNICODE));
    }
    public static function editFeature($product_id, $feature_id, $new_feature) {
        foreach (json_decode($new_feature, true) as $new_feature_key => $new_feature_value) {}
        $features = json_decode(ReaderProducts::getFeaturesById($product_id), true);
        $current_id = 1;
        foreach ($features as $key => $value) {
            if ($feature_id === $current_id) {
                $new_features[$new_feature_key] = $new_feature_value;
            } else {
                $new_features[$key] = $value;
            }
            $current_id++;
        }
        self::updateFeatures($product_id, json_encode($new_features, JSON_UNESCAPED_UNICODE));
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