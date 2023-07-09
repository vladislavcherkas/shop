<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/administrators/editor-administrators.php");
$first_name = $_POST["firstName"];
$last_name = $_POST["lastName"];
$password = $_POST["password"];
EditorAdministrators::delete($first_name, $last_name, $password);
?>