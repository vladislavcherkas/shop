<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/settings/settings.php");
class ReaderSettings extends Settings {
    public static function exist($name_setting, $value_setting) {
        $table = static::$table;
        $query = static::query("SELECT * FROM $table
                WHERE name_setting = '$name_setting' AND value_setting = '$value_setting'");
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
    public static function get($name_setting) {
        $table = static::$table;
        return static::query("SELECT * FROM $table WHERE name_setting = '$name_setting'")[0]["value_setting"];
    }
}
?>