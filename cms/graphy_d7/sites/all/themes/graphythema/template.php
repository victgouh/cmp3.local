<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*----- 404 pagina -----*/
function graphythema_preprocess_page(&$vars) {
    // Adds a Custom 404 page
    $header = drupal_get_http_header("status");
    if($header == "404 Not Found") {
        $vars['theme_hook_suggestions'][] = 'page__404';
    }
}

?>

<?php
