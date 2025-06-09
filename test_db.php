<?php
// Load Config
require_once 'app/config/config.php';

// Load Database
require_once 'app/core/Database.php';

try {
    $db = new Database();
    echo "Database connection successful!";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} 