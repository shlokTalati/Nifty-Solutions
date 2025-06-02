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
    <title><?= isset($pageTitle) ? $pageTitle : 'Nifty Solutions' ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="robots" content="index, follow">
    <!-- favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/public/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="48x48" href="/public/images/favicon.ico">
    <link rel="manifest" href="/public/manifest/site.webmanifest">
    <meta name="theme-color" content="#ffffff">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- style sheets and font icons -->
    <link rel="stylesheet" href="/public/css/vendors.min.css" />
    <link rel="stylesheet" href="/public/css/icon.min.css" />
    <link rel="stylesheet" href="/public/css/style.css" />
    <link rel="stylesheet" href="/public/css/responsive.css" />
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
</body>

</html>