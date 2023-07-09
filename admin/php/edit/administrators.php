<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/administrators/editor-administrators.php");
$first_name = $_POST["firstName"];
$last_name = $_POST["lastName"];
$password = $_POST["password"];
$first_name_new = $_POST["firstNameNew"];
$last_name_new = $_POST["lastNameNew"];
$password_new = $_POST["passwordNew"];
EditorAdministrators::edit($first_name, $last_name, $password,
    $first_name_new, $last_name_new, $password_new);
?>