<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/editor-products.php");
$id = $_POST["id"];
EditorProducts::delete($id);
?>