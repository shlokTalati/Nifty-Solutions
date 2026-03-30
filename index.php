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


// 5.1 Call blog controller if it is a blog route
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

// 5.2 Handle PDF tracking + redirect
if (preg_match('#^pdf/(.*)$#', $cleanPath, $matches)) {
    $pdfSlug = trim($matches[1]);

    // Map slug → actual file
    $pdfMap = [
        'Nifty_Solutions_profile.pdf' => 'Nifty_Solutions_profile.pdf',
        'Nifty-Solutions-Company-Profile'=> 'Nifty_Solutions_profile.pdf'
    ];

    // Validate slug
    if (!array_key_exists($pdfSlug, $pdfMap)) {
        http_response_code(404);
        echo "PDF not found.";
        exit;
    }

    $fileName = $pdfMap[$pdfSlug];
    $fileUrl  = '/public/pdf/' . $fileName; // public URL (not file path)

    // -------- TRACKING --------
    $utm_source   = $_GET['utm_source'] ?? 'unknown';
    $utm_campaign = $_GET['utm_campaign'] ?? 'unknown';
    $uid          = $_GET['uid'] ?? null;

    $data = [
        'client_id' => $uid ?? uniqid(),
        'events' => [[
            'name' => 'pdf_click',
            'params' => [
                'file_name' => $fileName,
                'slug' => $pdfSlug,
                'source' => $utm_source,
                'campaign' => $utm_campaign
            ]
        ]]
    ];

    $payload = json_encode($data);

    $ch = curl_init('https://www.google-analytics.com/mp/collect?measurement_id=G-HFJPXGTH23&api_secret=anR6M3veSCGomH8BIf0_kQ');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_TIMEOUT_MS, 300); // keep it fast, don’t block user
    curl_exec($ch);
    curl_close($ch);

    // -------- REDIRECT --------
    header("Location: $fileUrl", true, 302);
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