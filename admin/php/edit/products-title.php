<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/editor-products.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
$product_id = $_POST["productId"];
$title = $_POST["title"];
EditorProducts::updateTitle($product_id, $title);
echo ReaderProducts::getTitleById($product_id);
?>