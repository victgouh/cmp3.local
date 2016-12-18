<?php

/**
 * Implementation of hook_preprocess_page().
 */
function drk_base_omega_preprocess_page(&$variables) {

  // Add extra theme hook suggestions based on view mode.
  drk_base_omega_preprocess_page_theme_hook_suggestions($variables);

  // Hide title.
  drk_base_omega_preprocess_page_title($variables);

  // Hide breadcrumb.
  drk_base_omega_preprocess_page_breadcrumb($variables);

}

/**
 * Helper function drk_base_omega_preprocess_page_theme_hook_suggestions.
 *
 * Add extra theme hook suggestions based on view mode.
 *
 */
function drk_base_omega_preprocess_page_theme_hook_suggestions(&$variables) {

  if (isset($variables['node'])) {
    $sanitized_node_type = strtr($variables['node']->type, '.', '_');
    $variables['theme_hook_suggestions'][] = 'page__' . $sanitized_node_type;
  }

}

/**
 * Helper function drk_base_omega_preprocess_page_title.
 *
 * Hide title.
 *
 */
function drk_base_omega_preprocess_page_title(&$variables) {

  $variables['show_main_title'] = TRUE;
  if (isset($variables['node'])) {
    switch ($variables['node']->type) {
      case 'homepage':
      case 'landing_page_featured':
      case 'landing_page_service':
      case 'company':
      case 'library_page':
        $variables['show_main_title'] = FALSE;
        break;
    }
  }

}

/**
 * Helper function drk_base_omega_preprocess_page_breadcrumb.
 *
 * Hide breadcrumb.
 *
 */
function drk_base_omega_preprocess_page_breadcrumb(&$variables) {

  $variables['show_breadcrumb'] = TRUE;
  if (isset($variables['node'])) {
    switch ($variables['node']->type) {
      case 'homepage':
      case 'library_page':
        $variables['show_breadcrumb'] = FALSE;
        break;
    }
  }

}
