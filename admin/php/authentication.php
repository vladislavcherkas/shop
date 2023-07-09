<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/administrators/reader-administrators.php");
$exist = ReaderAdministrators::exist(
    $_POST["first_name"], $_POST["last_name"], $_POST["password"]);
if ($exist) {
    echo "true";
} else {
    echo "false";
}
?>