<?php
// Load Config
require_once '../app/config/config.php';

// Load Helpers
require_once '../app/helpers/url_helper.php';
require_once '../app/helpers/session_helper.php';

// Autoload Core Libraries
spl_autoload_register(function($className) {
    require_once '../app/core/' . $className . '.php';
});

// Init Core Library
$init = new Core; 