<?php

define('APP_ROOT', $_SERVER['DOCUMENT_ROOT'] . "/app/");

session_start();

// Helper function for requiring functions
function load_file($file) {
    require_once(APP_ROOT . $file);
}

// Loader for common stuff
load_file('utils/loader.php');

// Load the router
load_file('controllers/router.php');

?>
