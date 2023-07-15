<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/editor-products.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
$product_id = $_POST["productId"];
$price = $_POST["price"];
EditorProducts::updatePrice($product_id, $price);
echo ReaderProducts::getPriceById($product_id);
?>