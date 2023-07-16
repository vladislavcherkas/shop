<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/editor-products.php");
$type = $_POST["type"];
$product_id = $_POST["productId"];
if ($type === "get") {
    echo "true";
}
if ($type === "all") {
    echo "true";
}
if ($type === "single") {
    echo "true";
}
if ($type === "add") {
    EditorProducts::addFeature($product_id);
    echo "true";
}
if ($type === "remain") {
    echo "true";
}
?>