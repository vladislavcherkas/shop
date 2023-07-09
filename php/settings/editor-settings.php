<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/settings/settings.php");
class EditorSettings extends Settings {
    public static function edit($name_setting, $value_setting_new) {
        $table = static::$table;
        static::query("UPDATE $table
                SET value_setting = '$value_setting_new'
                WHERE name_setting = '$name_setting'");
    }
}
?>