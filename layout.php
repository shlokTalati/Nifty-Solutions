<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HFJPXGTH23"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HFJPXGTH23');
    </script>

    <!-- Auto-generated canonical tag to avoid duplicate content issues. 
    This uses the current domain and URL path (without query parameters) 
    to set the canonical URL dynamically for each page. -->
    <link rel="canonical" href="<?= htmlspecialchars('https://' . $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'], '?'), ENT_QUOTES, 'UTF-8') ?>" />

    <title><?= isset($page_title) ? $page_title : 'Nifty Solutions' ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description" content="<?= isset($meta_description) ? $meta_description : 'Nifty Solutions provides complete IT solutions in Vadodara - data backup, enterprise email, firewall security, web development & hardware. Expert IT support for businesses.' ?>">
    <meta name="robots" content="index, follow">
    <!-- favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/public/images/apple-touch-icon.webp">
    <link rel="icon" type="image/x-icon" sizes="48x48" href="/favicon.ico">
    <link rel="manifest" href="/public/manifest/site.webmanifest">
    <meta name="theme-color" content="#ffffff">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- style sheets and font icons -->
    <link rel="stylesheet" href="/public/css/vendors.min.css" />
    <link rel="stylesheet" href="/public/css/icon.min.css" />
    <link rel="stylesheet" href="/public/css/style.css" />
    <link rel="stylesheet" href="/public/css/responsive.min.css" />
    <link rel="stylesheet" href="/public/css/demo-it-business.css" />
    <link rel="stylesheet" href="/public/css/custom.css" />
</head>

<body data-mobile-nav-style="full-screen-menu" data-mobile-nav-bg-color="#252840">
    <?php include_once __DIR__ . '/components/header.php'; ?>

    <main>
        <?= $pageContent ?>
    </main>


    <?php include_once __DIR__ . '/components/footer.php'; ?>
    <?php include_once __DIR__ . '/components/scroll.php'; ?>
    <script type="text/javascript" src="/public/js/jquery.js"></script>
    <script type="text/javascript" src="/public/js/vendors.min.js"></script>
    <script type="text/javascript" src="/public/js/main.js"></script>
    <script type="text/javascript" src="/public/js/custom.js"></script>
     <!-- Additional javascript links can be included here -->
    <?php
    if (isset($additional_javascript_link)) {
        foreach ($additional_javascript_link as $link) {
            echo '<script type="text/javascript" src="' . htmlspecialchars($link, ENT_QUOTES, 'UTF-8') . '"></script>';
        }
    }
    ?>

    <!-- Additional inline scripts can be included here -->
    <?php
    if (isset($additional_inline_script)) {
        foreach ($additional_inline_script as $script) {
            echo '<script type="text/javascript">' . htmlspecialchars($script, ENT_QUOTES, 'UTF-8') . '</script>';
        }
    }
    ?>
</body>

</html>