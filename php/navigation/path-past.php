<?php
class PathPast {
    public static function get() {
        if (isset($_GET["path-past"])) {
            return $_GET["path-past"];
        }
        return "/";
    }
}
?>