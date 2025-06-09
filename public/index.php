<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Load Config
require_once __DIR__ . '/../app/config/config.php';

// Load Helpers
require_once __DIR__ . '/../app/helpers/url_helper.php';
require_once __DIR__ . '/../app/helpers/session_helper.php';

// Autoload Core Libraries
spl_autoload_register(function($className) {
    require_once __DIR__ . '/../app/core/' . $className . '.php';
});

// Init Core Library
$init = new Core; 