<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/settings/settings.php");
class EditorSettings extends Settings {
    public static function edit($name_setting, $value_setting_new) {
        $table = static::$table;
        $name_setting = addcslashes($name_setting, "'");
        $value_setting_new = addcslashes($value_setting_new, "'");
        static::query("UPDATE $table
                SET value_setting = '$value_setting_new'
                WHERE name_setting = '$name_setting'");
    }
    public static function add($name) {
        $table = static::$table;
        static::query("INSERT INTO $table (name_setting, value_setting)
            VALUES ('$name', '')");
    }
}
?>