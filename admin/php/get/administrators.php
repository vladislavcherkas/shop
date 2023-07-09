<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/administrators/reader-administrators.php");
$administrators = (new ReaderAdministrators())->getAll();
function rename_properties($administrators) {
    $administrators_new = [];
    foreach ($administrators as $key => $administrator) {
        $administrator_new = [];
        foreach ($administrator as $property => $value) {
            if ($property === "first_name") {
                $administrator_new["firstName"] = $value;
            }
            if ($property === "last_name") {
                $administrator_new["lastName"] = $value;
            }
            if ($property === "password") {
                $administrator_new["password"] = $value;
            }
        }
        $administrators_new[$key] = $administrator_new;
    }
    return $administrators_new;
}
$administrators = rename_properties($administrators);
echo json_encode($administrators);
?>