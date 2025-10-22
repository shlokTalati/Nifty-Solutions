<?php

class BlogController
{

    public static $blogDirectory = __DIR__ . '/../views/blog/';


public static function get_all_blog_posts(){
    $posts = [];

    // Scan the blog directory for blog files (PHP)
    $files = glob(self::$blogDirectory . '*.php');

    foreach ($files as $file) {
        $content = file_get_contents($file);

        // --- Parse <meta> tags from each blog file ---
        $metadata = [];
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($content);
        libxml_clear_errors();

        $metaTags = $doc->getElementsByTagName('meta');
        foreach ($metaTags as $meta) {
            $name = $meta->getAttribute('name');
            $value = $meta->getAttribute('content');
            if ($name && $value) {
                $metadata[$name] = $value;
            }
        }

        // --- Skip if there's no <meta name="title"> (means not a valid post) ---
        if (empty($metadata['title'])) {
            continue;
        }

        // --- Extract slug from filename ---
        $slug = basename($file, '.php');

        // --- Automatically generate post URL ---
        $metadata['url'] = '/blog/' . $slug;

        // --- Default thumbnail if missing ---
        if (empty($metadata['thumbnail'])) {
            $metadata['thumbnail'] = '/public/images/blog/thumbnails/' . $slug . '.webp';
        }

        // --- Add post metadata directly (no reconstruction) ---
        $posts[] = $metadata;
    }

    // --- Sort posts by date (newest first if available) ---
    usort($posts, function ($a, $b) {
        $dateA = isset($a['date']) ? strtotime($a['date']) : 0;
        $dateB = isset($b['date']) ? strtotime($b['date']) : 0;
        return $dateB - $dateA;
    });

    // --- Render the all blog posts view ---
    render_view(__DIR__ . '/../views/all-blog-posts.php', ['posts' => $posts]);
}

    public static function get_blog_post($slug)
{
    $fileName = self::$blogDirectory . $slug . '.php';

    if (!file_exists($fileName)) {
        http_response_code(404);
        render_view(__DIR__ . '/../views/404.php');
        return;
    }

    $content = file_get_contents($fileName);

    // --- Parse meta tags for dynamic data and make it Meta Data accessible in the blog post view---
    $metadata = [];
    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML($content);
    libxml_clear_errors();

    $metaTags = $doc->getElementsByTagName('meta');
    foreach ($metaTags as $meta) {
        $name = $meta->getAttribute('name');
        $value = $meta->getAttribute('content');
        if ($name && $value) {
            $metadata[$name] = $value;
        }
    }

    // Render the final blog content with layout
    render_view($fileName, ['metadata' => $metadata]);
}

}
?>