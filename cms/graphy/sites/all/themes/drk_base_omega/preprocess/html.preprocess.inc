<?php

/**
 * @file
 * Contains a pre-process hook for 'html'.
 */

/**
 * Implements hook_preprocess_TEMPLATE().
 */
function drk_base_omega_preprocess_html(&$variables) {

  // Add extra class for 404 pages
  drk_base_omega_preprocess_html_404($variables);

  // Add scripts in seperate reagion.
  drk_base_omega_header_scripts();

  // Add critical inline css.
  drk_base_omega_critical_inline_css();

}


/**
 *
 * Helper function drk_base_omega_preprocess_html_404.
 *
 * @param $variables
 */
function drk_base_omega_preprocess_html_404(&$variables) {

  $header = drupal_get_http_header("status");
  if($header == "404 Not Found") {
    $variables['classes_array'][] = 'page-not-found';
  }

}

/**
 *
 * Helper function drk_base_omega_header_scripts.
 */
function drk_base_omega_header_scripts() {
  drupal_add_js(drupal_get_path('theme', 'drk_base_omega') . '/assets/js/vendor/modernizr.min.js', array('scope' => 'head_scripts', 'weight' => -1, 'preprocess' => FALSE));
}

/**
 *
 * Helper function drk_base_omega_critical_inline_css.
 */
function drk_base_omega_critical_inline_css() {

  // Get current theme path
  $theme_path = drupal_get_path('theme', variable_get('theme_default', NULL));

  // Get css path
  $css_path = $theme_path . '/assets/css/critical.css';

  // Read file content if it exists and add it as inline css
  if(file_exists($css_path)) {
    $css = file_get_contents($css_path);
    if($css !== FALSE) {
      drupal_add_css($css, array('type' => 'inline'));
    }
  }

}
