<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/database.php");
class Tables extends Database {
    public $tables = [
        "admins" => [
            "first_name" => "TEXT",
            "last_name" => "TEXT",
            "password" => "TEXT",
        ]
        "products" => [
        ]
    ];
    function create($name_table) {
        $columns = "";
        foreach ($this->tables[$name_table] as $column => $types) {
            $columns = $columns . " " . $column
        }
    }
    function delete() {
        
    }
}
(new Tables())->create("admins");
?>