<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/editor-products.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
$product_id = $_POST["productId"];
$description = $_POST["description"];
EditorProducts::updateDescription($product_id, $description);
echo ReaderProducts::getDescriptionById($product_id);
?>