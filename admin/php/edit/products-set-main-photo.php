<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/editor-products.php");
$product_id = $_POST["idProduct"];
$name = $_POST["name"];
EditorProducts::setMainPhotoByName($product_id, $name);
?>