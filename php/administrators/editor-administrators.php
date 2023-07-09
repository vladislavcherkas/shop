<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/administrators/administrators.php");
class EditorAdministrators extends Administrators {
    public static function delete($first_name, $last_name, $password) {
        $table = static::$table;
        static::query("DELETE FROM $table
                WHERE first_name = '$first_name' AND last_name = '$last_name' AND password = '$password'");
    }
    public static function edit($first_name, $last_name, $password,
            $first_name_new, $last_name_new, $password_new) {
        $table = static::$table;
        static::query("UPDATE $table
                SET first_name = '$first_name_new', last_name = '$last_name_new', password = '$password_new'
                WHERE first_name = '$first_name' AND last_name = '$last_name' AND password = '$password'");
    }
    public static function create($first_name, $last_name, $password) {
        $table = static::$table;
        static::query("INSERT INTO $table (first_name, last_name, password)
                VALUES ('$first_name', '$last_name', '$password')");
    }
}
?>