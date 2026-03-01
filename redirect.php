<?php

// Redirect old URLs to new paths if matched
// Redirect old URLs to new paths if matched
$redirects = [
    // ── Endpoint-Security name change to Cybersecurity ─────────────────────
    'endpoint-security/firewall' => 'cybersecurity/firewall',
    'endpoint-security/antivirus-and-content-security' => 'cybersecurity/antivirus-and-content-security',
    'endpoint-security/data-leakage-prevention' => 'cybersecurity/data-leakage-prevention',
    'endpoint-security/email-security' => 'cybersecurity/email-security',

    
    'it-infrastructure/dedicated-vps' => 'it-infrastructure/dedicated-server-and-vps',


    'web-and-email-services/business-email' => 'email-services/business-email',
    'web-and-email-services/bulk-smtp' => 'email-services/bulk-smtp',
    'web-and-email-services/email-distribution' => 'email-services/email-distribution',

    'web-and-email-services/ssl-certificate' => 'website-services/ssl-certificate',
    'web-and-email-services/website-development' => 'website-services/website-development-and-hosting',

    'remote-work-and-monitoring/remote-access' => 'it-infrastructure/remote-access-solutions'
];

// If the request matches an old URL, it will redirect to the new path
if (array_key_exists($cleanPath, $redirects)) {
    header("Location: https://niftysolutions.co.in/" . $redirects[$cleanPath], true, 301);
    exit;
}




// Force HTTPS and non-www redirection for SEO purposes
// Force HTTPS and non-www redirection for SEO purposes
$host = $_SERVER['HTTP_HOST'];
$requestURI = $_SERVER['REQUEST_URI'];

// Don't run below block if the request is not from localhost
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