<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database/database.php");
class Administrators extends Database {
    protected static $table = "administrators";
}
?>