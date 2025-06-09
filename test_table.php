<?php
// Load Config
require_once 'app/config/config.php';

// Load Database
require_once 'app/core/Database.php';

try {
    $db = new Database();
    
    // Test query to check if table exists
    $db->query('SELECT * FROM posts LIMIT 1');
    $result = $db->resultSet();
    
    echo "Table 'posts' exists and is accessible!\n";
    echo "Number of posts: " . count($result);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
} 