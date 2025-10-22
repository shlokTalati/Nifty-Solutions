<?php

function render_view($view_path, $data = [])
{
    extract($data);
    ob_start();
    include $view_path;
    $pageContent = ob_get_clean();
    require(__DIR__ . '/layout.php');
}
?>