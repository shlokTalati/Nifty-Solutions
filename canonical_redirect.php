<?php
$host = $_SERVER['HTTP_HOST'];
$requestURI = $_SERVER['REQUEST_URI'];

// Dont run below block if the request is not from localhost
if ($host != 'localhost') {

    // Force non-www
    if (substr($host, 0, 4) === 'www.') {
        $host = substr($host, 4);
    }

    // Force HTTPS
    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: https://" . $host . $requestURI);
        exit();
    }

    // Redirect to non-www version even if HTTPS is already enabled
    if ($_SERVER['HTTP_HOST'] !== $host) {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: https://" . $host . $requestURI);
        exit();
    }

}
?>