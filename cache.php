<?php
function setCacheHeaders() {
    $request_uri = $_SERVER['REQUEST_URI'];
    $file_extension = pathinfo($request_uri, PATHINFO_EXTENSION);
    
    // Get current time
    $current_time = time();
    
    switch (strtolower($file_extension)) {
        // Images - Cache for 1 month (2592000 seconds)
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'webp':
        case 'svg':
        case 'ico':
            $cache_time = 2592000; // 1 month
            header('Cache-Control: public, max-age=' . $cache_time . ', immutable');
            header('Expires: ' . gmdate('D, d M Y H:i:s', $current_time + $cache_time) . ' GMT');
            header('Pragma: public');
            break;
            
        // CSS and JavaScript - Cache for 1 month (2592000 seconds)
        case 'css':
        case 'js':
            $cache_time = 2592000; // 1 month
            header('Cache-Control: public, max-age=' . $cache_time);
            header('Expires: ' . gmdate('D, d M Y H:i:s', $current_time + $cache_time) . ' GMT');
            header('Pragma: public');
            break;
            
        // Fonts - Cache for 1 month
        case 'woff2':
        case 'woff':
        case 'ttf':
        case 'otf':
        case 'eot':
            $cache_time = 2592000; // 1 month
            header('Cache-Control: public, max-age=' . $cache_time . ', immutable');
            header('Expires: ' . gmdate('D, d M Y H:i:s', $current_time + $cache_time) . ' GMT');
            header('Pragma: public');
            break;
            
        // Videos - Cache for 1 month
        case 'mp4':
        case 'webm':
        case 'ogg':
            $cache_time = 2592000; // 1 month
            header('Cache-Control: public, max-age=' . $cache_time);
            header('Expires: ' . gmdate('D, d M Y H:i:s', $current_time + $cache_time) . ' GMT');
            header('Pragma: public');
            break;
            
        // Documents - Cache for 1 month
        case 'pdf':
        case 'zip':
        case 'doc':
        case 'docx':
            $cache_time = 2592000; // 1 month
            header('Cache-Control: public, max-age=' . $cache_time);
            header('Expires: ' . gmdate('D, d M Y H:i:s', $current_time + $cache_time) . ' GMT');
            header('Pragma: public');
            break;
            
        // HTML - Cache for 1 Day
        case 'html':
        case 'htm':
        case '':
            $cache_time = 86400; // 1 Day
            header('Cache-Control: public, max-age=' . $cache_time);
            header('Expires: ' . gmdate('D, d M Y H:i:s', $current_time + $cache_time) . ' GMT');
            header('Pragma: public');
            break;
            
        // Default - Cache for 12 Hours
        default:
            $cache_time = 43200; // 12 Hours
            header('Cache-Control: public, max-age=' . $cache_time);
            header('Expires: ' . gmdate('D, d M Y H:i:s', $current_time + $cache_time) . ' GMT');
            header('Pragma: public');
            break;
    }
}

// Call this function at the top of your pages
setCacheHeaders();
?>