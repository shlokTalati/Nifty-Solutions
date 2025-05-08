<?php
// 1. Clean the URL (strip query string, leading slash, and trailing slash)
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$cleanPath = trim($requestUri, '/');

// 2. Define your route → view file map
require( __DIR__ . '/routes.php'); // Routes.php contains the $routes array


// 2.1 Check for robots.txt
// This is a simple check to see if the request is for robots.txt
if ($cleanPath === 'robots.txt') {
    $robotsPath = __DIR__ . '/robots.txt'; // Or wherever you put it

    if (file_exists($robotsPath)) {
        header('Content-Type: text/plain');
        http_response_code(200);
        readfile($robotsPath);
        exit;
    } else {
        http_response_code(404);
        echo "robots.txt not found.";
        exit;
    }
}


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