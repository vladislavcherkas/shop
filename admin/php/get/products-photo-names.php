<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/reader-products.php");
$id = $_POST["idProduct"];
$photo_names = array_diff(explode(" ", ReaderProducts::getPhotosById($id)), [""]);
echo json_encode($photo_names);
?>