<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/settings/editor-settings.php");
$name_setting = $_POST["nameSetting"];
$value_setting_new = $_POST["valueSettingNew"];
EditorSettings::edit($name_setting, $value_setting_new);
?>