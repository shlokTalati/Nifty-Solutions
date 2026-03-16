<?php


$redirects = [
    
    // OLD PHP REDIRECTS
    // OLD PHP REDIRECTS
    
    'index.php' => '',
    // Main pages
    'aboutus.php' => 'about-us',
    'contact.php' => 'contact-us',
    'portfolio.php' => 'portfolio',
    'client.php' => 'clients',
    'now-hiring.php' => 'careers',
    // Firewall Solutions
    'fortinet.php' => 'cybersecurity/firewall',
    'sophos.php' => 'cybersecurity/firewall',
    // Antivirus and Content Security
    'bitdefender.php' => 'cybersecurity/antivirus',
    'escan.php' => 'cybersecurity/antivirus',
    // Data Leakage Prevention
    'safetica.php' => 'cybersecurity/data-leakage-prevention',
    'dlf-escan.php' => 'cybersecurity/data-leakage-prevention',
    // Email Security
    'rmail.php' => 'cybersecurity/email-spam-protection',
    'spam-expert.php' => 'cybersecurity/email-spam-protection',
    'barracuda-essentials.php' => 'cybersecurity/email-spam-protection',
    // Data Backup Solutions
    'iperiusbackup.php' => 'backup-and-recovery/data-backup',
    'novabackup.php' => 'backup-and-recovery/data-backup',
    // Email Backup
    'mailvault.php' => 'backup-and-recovery/email-backup',
    'mailstore.php' => 'backup-and-recovery/email-backup',
    // Cloud Backup
    'acronis.php' => 'backup-and-recovery/cloud-backup',
    // Disaster Recovery
    'disaster-recovery-acronis.php' => 'backup-and-recovery/disaster-recovery',
    // NAS Storage
    'synology.php' => 'backup-and-recovery/nas-storage',
    // Business Email Services
    'google-email-hosting.php' => 'email-services/business-email',
    'microsoft-365.php' => 'email-services/business-email',
    'icewarp.php' => 'email-services/business-email',
    'linux-email-hosting.php' => 'email-services/business-email',
    'hybrid-email-hosting.php' => 'email-services/business-email',
    // Email Distribution
    'postmaster.php' => 'email-services/email-distribution',
    // Website Development
    'web-design-service.php' => 'website-services/website-development-and-hosting',
    // SSL Certificate
    'ssl-certificate.php' => 'website-services/ssl-certificate',
    // Bulk SMTP Services
    'smtp-services.php' => 'email-services/bulk-email',
    // Remote Access Solutions
    'tsplus.php' => 'it-infrastructure/remote-access-solutions',
    'iperius_remote_desktop.php' => 'it-infrastructure/remote-access-solutions',
    // Hardware Network AMC
    'computer-and-network.php' => 'it-infrastructure/amc-fms',
    // Dedicated VPS
    'dedicated-server.php' => 'it-infrastructure/dedicated-server-and-vps',
    // Licensed Software
    'foxit_pdf.php' => 'it-infrastructure/licensed-software',






    // NEW SEO REDIRECTS

    // ── Endpoint-Security name change to Cybersecurity ─────────────────────
    'endpoint-security/firewall' => 'cybersecurity/firewall',
    'endpoint-security/antivirus-and-content-security' => 'cybersecurity/antivirus',
    'endpoint-security/data-leakage-prevention' => 'cybersecurity/data-leakage-prevention',
    'endpoint-security/email-security' => 'cybersecurity/email-spam-protection',
    'cybersecurity/email-security' => 'cybersecurity/email-spam-protection',
    'cybersecurity/antivirus-and-content-security' => 'cybersecurity/antivirus',

    
    'it-infrastructure/dedicated-vps' => 'it-infrastructure/dedicated-server-and-vps',
    'it-infrastructure/hardware-network-amc' => 'it-infrastructure/amc-fms',

    'web-and-email-services/business-email' => 'email-services/business-email',
    'web-and-email-services/bulk-smtp' => 'email-services/bulk-email',
    'email-services/bulk-smtp' => 'email-services/bulk-email',
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