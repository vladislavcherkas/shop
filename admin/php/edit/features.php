<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/editor-products.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/settings/editor-settings.php");
function convert_id($id) {
    if ($id % 2 === 0) {
        return $id / 2;
    } else {
        return ($id + 1) / 2;
    }
}
$type = $_POST["type"];
if ($type === "all") {
    $product_id = $_POST["productId"];
    $features = $_POST["features"];
    EditorProducts::updateFeatures($product_id, $features);
    echo "true";
}
if ($type === "single") {
    $product_id = $_POST["productId"];
    $feature_id = convert_id(intval($_POST["id"]));
    $new_feature = $_POST["feature"];
    if ($new_feature === "false") {
        echo "false";
    } else {
        EditorProducts::editFeature($product_id, $feature_id, $new_feature);
        echo "true";
    }
}
if ($type === "add") {
    $product_id = $_POST["productId"];
    EditorProducts::addFeature($product_id);
    echo "true";
}
if ($type === "remain") {
    $product_id = $_POST["productId"];
    $features = $_POST["features"];
    EditorSettings::edit("Характеристики по умолчанию", $features);
    echo "true";
}
?>