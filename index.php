<?php

define('APP_ROOT', $_SERVER['DOCUMENT_ROOT'] . "/app/");

// Helper function for requiring functions
function load_file($file) {
    require_once(APP_ROOT . $file);
}

load_file('utils/loader.php');
load_file('controllers/router.php');

?>
