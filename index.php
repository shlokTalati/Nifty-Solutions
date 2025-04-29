<?php
// 1. Clean the URL (strip query string, leading slash, and trailing slash)
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$cleanPath = trim($requestUri, '/');

// 2. Define your route → view file map
require( __DIR__ . '/routes.php'); // Routes.php contains the $routes array

// 3. Check if route exists
if (array_key_exists($cleanPath, $routes)) {
    $viewFile = __DIR__ . '/views/' . $routes[$cleanPath];
    
    
    if (file_exists($viewFile)) {
        // require $viewFile;
        require('layout.php');
        exit;
    }
}

// 4. Show 404 if route or file not found
require __DIR__ . '/views/404.php';