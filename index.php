<?php
// 0. Include utilities
require_once(__DIR__ . '/utilities.php');

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
// 3.2 Check for contact-form
if ($cleanPath === 'contact-form') {
    $contact_form_path = __DIR__ . '/contact-form.php'; // Path to contact-form.php

    if (file_exists($contact_form_path)) {
        require $contact_form_path;
        exit;
    } else {
        http_response_code(404);
        echo "contact-form.php not found.";
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


/* 4
1) Check for older URLs and redirects if matched
2) Redirects from www to non-www and HTTP to HTTPS for SEO consistency
*/
require(__DIR__ . '/redirect.php'); // This file contains the $redirects array and logic


// 5. Call blog controller if it is a blog route
if (preg_match('#^blog(?:/(.*))?$#', $cleanPath, $matches)) {
    require(__DIR__ . '/controllers/blog.php');

    // $matches[1] will contain the slug if it exists
    $slug = isset($matches[1]) ? trim($matches[1]) : '';

    if ($slug === '') {
        BlogController::get_all_blog_posts(); // e.g., show list of blogs
    } else {
        BlogController::get_blog_post($slug); // e.g., show specific blog post
    }

    exit;
}


// 6. Check if view route exists
if (array_key_exists($cleanPath, $routes)) {
    $viewFile = __DIR__ . '/views/' . $routes[$cleanPath];
    if (!file_exists($viewFile)) {
        $viewFile = __DIR__ . '/views/404.php';
        header("HTTP/1.0 404 Not Found");
    }
}
else{
// 7. Show 404 if route or file not found
    $viewFile = __DIR__ . '/views/404.php';
    header("HTTP/1.0 404 Not Found");
}

// Renders the View
render_view($viewFile);
exit;

?>