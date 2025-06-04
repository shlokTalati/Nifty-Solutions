<?php
// 1. Clean the URL (strip query string, leading slash, and trailing slash)
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$cleanPath = trim($requestUri, '/');

// 2. Define route → view file map
require( __DIR__ . '/routes.php'); // Routes.php contains the $routes array


// 3.1 Check for robots.txt
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

// 
// 3.2 Check for sendmail.php
if ($cleanPath === 'sendmail') {
    $sendmailPath = __DIR__ . '/contact-form.php'; // Path to contact-form.php

    if (file_exists($sendmailPath)) {
        require $sendmailPath;
        exit;
    } else {
        http_response_code(404);
        echo "sendmail.php not found.";
        exit;
    }
}

// 3.3 Check for sitemap.xml
if ($cleanPath === 'sitemap.xml') {
    $sitemapPath = __DIR__ . '/sitemap.xml';

    if (file_exists($sitemapPath)) {
        header('Content-Type: application/xml');
        http_response_code(200);
        readfile($sitemapPath);
        exit;
    } else {
        http_response_code(404);
        echo "sitemap.xml not found.";
        exit;
    }
}

// 3.4 Check for favicon.ico
if ($cleanPath === 'favicon.ico') {
    $faviconPath = __DIR__ . '/public/images/favicon.ico';

    if (file_exists($faviconPath)) {
        header('Content-Type: image/x-icon');
        http_response_code(200);
        readfile($faviconPath);
        exit;
    } else {
        http_response_code(404);
        echo "Favicon not found.";
        exit;
    }
}


// 4.0 Check for older URLs and redirect if necessary
require(__DIR__ . '/redirect.php'); // This file contains the $redirects array and logic


// 4.1 Redirect from www to non-www
require(__DIR__ . '/canonical_redirect.php'); // This file handles www to non-www redirects


// 5. Check if view route exists
if (array_key_exists($cleanPath, $routes)) {
    $viewFile = __DIR__ . '/views/' . $routes[$cleanPath];
    
    if (file_exists($viewFile)) {
        // Step 1: Include the view file first – it sets variables like $page_title
        ob_start();
        include $viewFile;
        $pageContent = ob_get_clean();

        // Step 2: Now load the layout, which uses $page_title and $pageContent
        require 'layout.php';
        exit;
    }
}

// 6. Show 404 if route or file not found
    $viewFile = __DIR__ . '/views/404.php';
    // require $layoutFile;
    ob_start();
    include $viewFile;
    $pageContent = ob_get_clean();
    header("HTTP/1.0 404 Not Found");
    require('layout.php');
    exit;


