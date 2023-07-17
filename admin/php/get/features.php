<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
$product_id = $_POST["productId"];
$features = ReaderProducts::getFeaturesById($product_id);
echo $features;
?>