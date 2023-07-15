<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/editor-products.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
$product_id = $_POST["productId"];
$existence = $_POST["existence"];
EditorProducts::updateExistence($product_id, $existence);
echo ReaderProducts::getExistenceById($product_id);
?>