<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
$products = (new ReaderProducts())->getAll();
echo json_encode($products);
?>