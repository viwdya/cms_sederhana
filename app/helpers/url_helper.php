<?php
// URL Root
define('URLROOT', 'http://localhost/cms_sederhana');

// Redirect function
function redirect($page) {
    header('location: ' . URLROOT . '/' . $page);
} 