<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database/database.php");
class Settings extends Database {
    protected static $table = "settings";
}
?>