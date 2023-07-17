<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/editor-products.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/settings/editor-settings.php");
$type = $_POST["type"];
if ($type === "all") {
    echo "true";
}
if ($type === "single") {
    echo "true";
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