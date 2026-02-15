<?php
$routes = [
    // Home
    '' => 'home.php',

    // ── Endpoint, Network & Data Protection ─────────────────────
    'endpoint-security/firewall'                   => 'endpoint-security/firewall.php',
    'endpoint-security/antivirus-and-content-security'          => 'endpoint-security/antivirus-and-content-security.php',
    'endpoint-security/data-leakage-prevention'    => 'endpoint-security/data-leakage-prevention.php',
    'endpoint-security/email-security'             => 'endpoint-security/email-security.php',

    // ── Backup & Recovery ───────────────────────────────────────
    'backup-and-recovery/data-backup'              => 'backup-and-recovery/data-backup-software.php',
    'backup-and-recovery/email-backup'             => 'backup-and-recovery/email-backup-solution.php',
    'backup-and-recovery/cloud-backup'             => 'backup-and-recovery/cloud-backup.php',
    'backup-and-recovery/disaster-recovery'        => 'backup-and-recovery/disaster-recovery.php',
    'backup-and-recovery/nas-storage'              => 'backup-and-recovery/network-attached-storage.php',

    // ── Email Services ───────────────────────────────────
    'email-services/business-email'        => 'email-services/business-email-hosting.php',
    'email-services/bulk-smtp'             => 'email-services/bulk-smtp.php',
    'email-services/email-distribution'    => 'email-services/email-distribution.php',


    // ── Website Solutions ───────────────────────────────────
    'website-solutions/website-development-and-hosting'       => 'website-solutions/website-development-and-hosting.php',
    'website-solutions/ssl-certificate'       => 'website-solutions/ssl-certificate.php',

    // ── Remote Work & Monitoring ────────────────────────────────
    'remote-work-and-monitoring/employee-monitoring'=> 'remote-work-and-monitoring/employee-monitoring.php',

    // ── IT Infra & Hosting ──────────────────────────────────────
    'it-infrastructure/hardware-network-amc'       => 'it-infrastructure/computer-hardware-and-network-amc-fms.php',
    'it-infrastructure/remote-access-solutions'    => 'it-infrastructure/remote-access-solutions.php',
    // 'it-infrastructure/network-monitoring'         => 'it-infrastructure/network-monitoring-and-ticketing.php',
    'it-infrastructure/dedicated-vps'              => 'it-infrastructure/dedicated-server-and-vps.php',
    'it-infrastructure/licensed-software'          => 'it-infrastructure/licensed-software.php',

    // ── Other Pages ─────────────────────────────────────────────
    'about-us'     => 'about-us.php',
    'portfolio'    => 'portfolio.php',
    'clients'      => 'clients.php',
    'careers'      => 'careers.php',
    'downloads'    => 'downloads.php',
    'contact-us'   => 'contact-us.php',
];
?>