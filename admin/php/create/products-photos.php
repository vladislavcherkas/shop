<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/products/editor-products.php");
function nameFileOfPath($path) {
    $x = explode("/", $path);
    return end($x);
}
$added_photos = [];
foreach ($_FILES as $photo) {
    $unique_name_photo = $_SERVER["DOCUMENT_ROOT"] . "/images/products/" . EditorProducts::getUniqueNamePhoto($photo["type"]);
    $moved = move_uploaded_file(
        $photo["tmp_name"],
        $unique_name_photo,
    );
    $added_photos[] = nameFileOfPath($unique_name_photo);
    if ($moved === true) {
        EditorProducts::addPhoto($_POST["id_product"], $unique_name_photo);
    }
}
echo json_encode($added_photos);
?>