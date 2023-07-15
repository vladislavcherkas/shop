<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
$product_id = $_POST["productId"];
$features = ReaderProducts::getFeaturesById($product_id);
if ($features === "") {
    $features = '{
        "8":"9",
        "*":"11",
        "return":"13",
        "1d4":"15"
    }';
}
echo $features;
?>