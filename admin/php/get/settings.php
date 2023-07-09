<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/settings/reader-settings.php");
$settings = (new ReaderSettings())->getAll();
function rename_properties($settings) {
    $settings_new = [];
    foreach ($settings as $key => $setting) {
        $setting_new = [];
        foreach ($setting as $property => $value) {
            if ($property === "name_setting") {
                $setting_new["nameSetting"] = $value;
            }
            if ($property === "value_setting") {
                $setting_new["valueSetting"] = $value;
            }
        }
        $settings_new[$key] = $setting_new;
    }
    return $settings_new;
}
$settings = rename_properties($settings);
echo json_encode($settings);
?>