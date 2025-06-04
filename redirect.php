<?php 

// 3. Redirect old URLs to new paths if mapped
$redirects = [
    // Homepage redirects
    'index.php' => '',
    
    // Main pages
    'aboutus.php' => 'about-us',
    'contact.php' => 'contact-us',
    'portfolio.php' => 'portfolio',
    'client.php' => 'clients',
    'download.php' => 'downloads',
    'now-hiring.php' => 'careers',
    
    // Firewall Solutions
    'fortinet.php' => 'endpoint-security/firewall',
    'sophos.php' => 'endpoint-security/firewall',
    
    // Antivirus and Content Security
    'bitdefender.php' => 'endpoint-security/antivirus-and-content-security',
    'escan.php' => 'endpoint-security/antivirus-and-content-security',
    
    // Data Leakage Prevention
    'safetica.php' => 'endpoint-security/data-leakage-prevention',
    'dlf-escan.php' => 'endpoint-security/data-leakage-prevention',
    
    // Email Security
    'rmail.php' => 'endpoint-security/email-security',
    'spam-expert.php' => 'endpoint-security/email-security',
    'barracuda-essentials.php' => 'endpoint-security/email-security',
    
    // Data Backup Solutions
    'iperiusbackup.php' => 'backup-and-recovery/data-backup',
    'novabackup.php' => 'backup-and-recovery/data-backup',
    
    // Email Backup
    'mailvault.php' => 'backup-and-recovery/email-backup',
    'mailstore.php' => 'backup-and-recovery/email-backup',
    
    // Cloud Backup
    'acronis.php' => 'backup-and-recovery/cloud-backup',
    'bkp360.php' => 'backup-and-recovery/cloud-backup',
    
    // Disaster Recovery
    'disaster-recovery-acronis.php' => 'backup-and-recovery/disaster-recovery',
    
    // NAS Storage
    'synology.php' => 'backup-and-recovery/nas-storage',
    
    // Business Email Services
    'google-email-hosting.php' => 'web-and-email-services/business-email',
    'microsoft-365.php' => 'web-and-email-services/business-email',
    'icewarp.php' => 'web-and-email-services/business-email',
    'linux-email-hosting.php' => 'web-and-email-services/business-email',
    'hybrid-email-hosting.php' => 'web-and-email-services/business-email',
    
    // Email Distribution
    'postmaster.php' => 'web-and-email-services/email-distribution',


    // Website Development
    'web-design-service.php' => 'web-and-email-services/website-development',
    
    // SSL Certificate
    'ssl-certificate.php' => 'web-and-email-services/ssl-certificate',
    
    // Bulk SMTP Services
    'smtp-services.php' => 'web-and-email-services/bulk-smtp',
    
    // Remote Access Solutions
    'tsplus.php' => 'remote-work-and-monitoring/remote-access',
    'iperius_remote_desktop.php' => 'remote-work-and-monitoring/remote-access',
    
    // Employee Monitoring
    'imonitor.php' => 'remote-work-and-monitoring/employee-monitoring',
    
    // Hardware Network AMC
    'computer-and-network.php' => 'it-infrastructure/hardware-network-amc',
    
    // Network Monitoring
    'motadata.php' => 'it-infrastructure/network-monitoring',
    
    // Dedicated VPS
    'dedicated-server.php' => 'it-infrastructure/dedicated-vps',
    
    // Licensed Software
    'foxit_pdf.php' => 'it-infrastructure/licensed-software',
];

// If the request matches an old URL, it will redirect to the new path
if (array_key_exists($cleanPath, $redirects)) {
    header("Location: https://niftysolutions.co.in/" . $redirects[$cleanPath], true, 301);
    exit;
}