<?php
$routes = [
    // Home
    '' => 'home.php',

    // ── Endpoint, Network & Data Protection ─────────────────────
    'endpoint-security/firewall'                   => 'endpoint-security/firewall.php',
    'endpoint-security/antivirus-and-content-security'          => 'endpoint-security/antivirus_and_content_security.php',
    'endpoint-security/data-leakage-prevention'    => 'endpoint-security/data_leakage_prevention.php',
    'endpoint-security/email-security'             => 'endpoint-security/email_security.php',

    // ── Backup & Recovery ───────────────────────────────────────
    'backup-and-recovery/data-backup'              => 'backup-and-recovery/data_backup_software.php',
    'backup-and-recovery/email-backup'             => 'backup-and-recovery/email_backup_solution.php',
    'backup-and-recovery/cloud-backup'             => 'backup-and-recovery/cloud_backup.php',
    'backup-and-recovery/disaster-recovery'        => 'backup-and-recovery/disaster_recovery.php',
    'backup-and-recovery/nas-storage'              => 'backup-and-recovery/network-attached-storage.php',

    // ── Email & Web Solutions ───────────────────────────────────
    'web-and-email-services/website-hosting'       => 'web-and-email-solutions/website_development_and_hosting.php',
    'web-and-email-services/business-email'        => 'web-and-email-solutions/business_email_hosting.php',
    'web-and-email-services/ssl-certificate'       => 'web-and-email-solutions/ssl-certificate.php',
    'web-and-email-services/bulk-smtp'             => 'web-and-email-solutions/smtp_services_for_bulk_email.php',
    'web-and-email-services/email-distribution'    => 'web-and-email-solutions/email_distribution_software.php',

    // ── Remote Work & Monitoring ────────────────────────────────
    'remote-work-and-monitoring/remote-access'     => 'remote-work-and-monitoring/remote_access_apps_and_desktop.php',
    'remote-work-and-monitoring/employee-monitoring'=> 'remote-work-and-monitoring/employee_monitoring.php',
    'remote-work-and-monitoring/motadata'          => 'remote-work-and-monitoring/motadata.php',

    // ── IT Infra & Hosting ──────────────────────────────────────
    'it-infrastructure/hardware-network-amc'       => 'it-infrastructure/computer_hardware_and_network_amc_fms.php',
    'it-infrastructure/network-monitoring'         => 'it-infrastructure/network_monitoring_and_ticketing.php',
    'it-infrastructure/dedicated-vps'              => 'it-infrastructure/dedicated_server_and_vps.php',
    'it-infrastructure/licensed-software'          => 'it-infrastructure/licensed_software.php',

    // ── Other Pages ─────────────────────────────────────────────
    'about-us'     => 'about_us.php',
    'portfolio'    => 'portfolio.php',
    'clients'      => 'clients.php',
    'careers'      => 'careers.php',
    'downloads'    => 'downloads.php',
    'contact-us'   => 'contact_us.php',
];
?>