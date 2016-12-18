<?php

function drk_base_omega_css_alter(&$css) {

  unset($css[drupal_get_path('module', 'field_collection') . '/field_collection.theme.css']);
  unset($css[drupal_get_path('module', 'ctools') . '/css/ctools.css']);
  unset($css[drupal_get_path('module', 'pollanon') . '/pollanon.css']);
  unset($css[drupal_get_path('module', 'views_slideshow') . '/views_slideshow.css']);
  unset($css[drupal_get_path('theme', 'omega') . '/css/modules/system/system.base.css']);
  unset($css[drupal_get_path('theme', 'omega') . '/css/modules/system/system.theme.css']);
  unset($css[drupal_get_path('theme', 'omega') . '/css/modules/system/system.messages.theme.css']);
  unset($css[drupal_get_path('theme', 'omega') . '/css/modules/aggregator/aggregator.theme.css']);
  unset($css[drupal_get_path('theme', 'omega') . '/css/modules/comment/comment.theme.css']);
  unset($css[drupal_get_path('theme', 'omega') . '/css/modules/field/field.theme.css']);
  unset($css[drupal_get_path('theme', 'omega') . '/css/modules/poll/poll.theme.css']);
  unset($css[drupal_get_path('theme', 'omega') . '/css/modules/search/search.theme.css']);
  unset($css[drupal_get_path('theme', 'omega') . '/css/modules/user/user.base.css']);
  unset($css[drupal_get_path('theme', 'omega') . '/css/modules/user/user.theme.css']);
  unset($css[drupal_get_path('module', 'node') . '/node.css']);
  unset($css[drupal_get_path('module', 'gmap') . '/gmap.css']);
  unset($css[drupal_get_path('module', 'mollom') . '/mollom.css']);
  unset($css[drupal_get_path('module', 'companyguide') . '/css/companyguide.css']);
  unset($css['misc/ui/jquery.ui.core.css']);
  unset($css['misc/ui/jquery.ui.theme.css']);
  unset($css['misc/ui/jquery.ui.autocomplete.css']);


}

function drk_base_omega_js_alter(&$js) {
  unset($js[drupal_get_path('theme', 'omega') . '/js/no-js.js']);
  unset($js[drupal_get_path('module', 'jcarousel') . '/js/jquery.jcarousel.min.js']);
  unset($js[drupal_get_path('module', 'jcarousel') . '/js/jcarousel.js']);
  unset($js[drupal_get_path('module', 'wysiwyg') . '/wysiwyg.js']);
}

function drk_base_omega_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    array_push($breadcrumb, '<span>' . drupal_get_title() . '</span>');

    $crumbs = implode('', $breadcrumb);
    $output = "<div class='breadcrumb'>$crumbs</div>";
    return $output;
  }
}

/**
 * Theme function to output content for classic Quicktabs style tabs.
 *
 * @ingroup themeable
 */
function drk_base_omega_qt_quicktabs($variables) {
  $element = $variables['element'];
  $output = '<div '. drupal_attributes($element['#options']['attributes']) .'>';

  $output .= "<div class='centered clearfix'>";
  $output .= drupal_render($element['tabs']);
  $output .= '</div>';

  $output .= drupal_render($element['container']);

  $output .= '</div>';
  return $output;
}

function drk_base_omega_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );

  foreach (drupal_get_messages($display) as $type => $messages) {
    if ($type == "error") {
      $icon = '<i class="fa fa-exclamation-triangle"></i>';
    } else if($type == "warning") {
      $icon = '<i class="fa fa-info-circle"></i>';
    } else if($type == "status") {
      $icon = '<i class="fa fa-info-circle"></i>';
    } else {
      $icon = '';
    }

    $output .= '<div class="messages messages--' . $type . '"> <a href="#" class="close"><i class="fa fa-times"></i></a>';

    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>";
    }

    $output .= '<ul>';
    foreach ($messages as $message) {
      $output .= '  <li>' . $icon . $message . '</li>';
    }

    $output .= '</ul>';
    $output .= '</div>';
  }

  return $output;
}

/**
 * Theme the pager summary for a search result.
 */
function drk_base_omega_culturefeed_search_pager_summary($variables) {

  $result = $variables['result'];

  $end = $variables['start'] + $result->getCurrentCount();
  $args = array(
    '@range' => ($variables['start'] + 1) . '-' . $end,
  );

  $pager_summary = format_plural($result->getTotalCount(), '@range from @count result', '@range from @count results', $args);

  return '<p>' . $pager_summary . '</p>';

}

/**
* Process variables for search-result.tpl.php.
*
* @see search-result.tpl.php
*/

function drk_base_omega_preprocess_search_result(&$variables) {
// Remove user name and modification date from search results
$variables['info'] = '';

}
