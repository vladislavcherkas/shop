<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/administrators/administrators.php");
class ReaderAdministrators extends Administrators {
    public static function exist($first_name, $last_name, $password) {
        $table = static::$table;
        $query = static::query("SELECT * FROM $table
                WHERE first_name = '$first_name' AND last_name = '$last_name' AND
                password = '$password'");
        if ($query === []) {
            return false;
        } else {
            return true;
        }
    }
    public static function getAll() {
        $table = static::$table;
        return static::query("SELECT * FROM $table");
    }
}
?>