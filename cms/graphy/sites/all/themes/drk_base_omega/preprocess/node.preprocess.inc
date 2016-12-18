<?php

/**
 * @file
 * Contains a pre-process hook for 'node'.
 */

/**
 * Implements hook_preprocess_node().
 */
function drk_base_omega_preprocess_node(&$variables) {
  switch ($variables['type']) {
    case 'homepage':
      drk_base_omega_preprocess_node_homepage($variables);
      break;
    case 'service':
      drk_base_omega_preprocess_node_service($variables);
      break;
    case 'nieuws':
      drk_base_omega_preprocess_node_nieuws($variables);
      break;
    case 'shortcut':
      drk_base_omega_preprocess_node_shortcut($variables);
      break;
    case 'library_page':
      drk_base_omega_preprocess_node_library_page($variables);
      break;
    case 'company':

      if (!$variables['teaser']) {
        drk_base_omega_preprocess_node_company($variables);
      }
      break;
  }

  // Add extra theme hook suggestions.
  drk_base_omega_preprocess_node_theme_hook_suggestions($variables);

  // Hide locations block
  drk_base_omega_preprocess_node_hide_location($variables);

  // Hide locations block
  drk_base_omega_preprocess_node_add_classes($variables);

  // Hide statistics
  drk_base_omega_preprocess_node_hide_statistics($variables);


}

/**
 * Callback function that preprocesses company nodes.
 */
function drk_base_omega_preprocess_node_company(&$variables) {
  $node = $variables['node'];
  // Node title.
  $variables['title'] = check_plain($node->title);

  // Logo image.
  if (!empty($node->field_company_image[LANGUAGE_NONE][0]['uri'])) {
    $image_uri = $node->field_company_image[LANGUAGE_NONE][0]['uri'];
    $image_style = array(
      'style_name' => 'thumbnail',
      'path' => $image_uri,
      'width' => '',
      'height' => '',
    );
    $variables['company_logo'] = l(theme('image_style', $image_style), file_create_url($image_uri), array(
      'html' => TRUE,
      'attributes' => array('class' => 'colorbox', 'itemprop' => 'image'),
    ));
  }

  // Create company address.
  $variables['company_address'] = '';
  if (!empty($node->field_company_street)) {
    $variables['company_address'] .= $node->field_company_street[LANGUAGE_NONE][0]['safe_value'];
  }
  if (!empty($node->field_company_streetnr)) {
    $variables['company_address'] .= ' ' . $node->field_company_streetnr[LANGUAGE_NONE][0]['safe_value'];
  }
  if (!empty($node->field_company_busnr[LANGUAGE_NONE][0]['safe_value']) && $node->field_company_busnr[LANGUAGE_NONE][0]['safe_value'] != '0') {
    $variables['company_address'] .= ' ' . t('Bus') . ' ' . $node->field_company_busnr[LANGUAGE_NONE][0]['safe_value'];
  }

  // Company Postal code and city.
  $variables['company_city'] = '';
  if (!empty($node->field_company_postcode)) {
    $variables['company_city'] .= '<span itemprop="postalCode">' . $node->field_company_postcode[LANGUAGE_NONE][0]['value'] . '</span>';
  }
  if (!empty($node->field_company_subcity)) {
    $variables['company_city'] .= ' <span itemprop="addressLocality">' . $node->field_company_subcity[LANGUAGE_NONE][0]['value'] . '</span>';
  }

  // Company contact info.
  if (!empty($node->field_company_email[LANGUAGE_NONE][0]['safe_value'])) {
    $email = $node->field_company_email[LANGUAGE_NONE][0]['safe_value'];
    $variables['company_contact_email'] = l($email, 'mailto:' . $email, array(
      'absolute' => TRUE,
      'attributes' => array('itemprop' => 'email')
    ));
  }
  if (!empty($node->field_company_website[LANGUAGE_NONE][0]['safe_value'])) {
    $url = $node->field_company_website[LANGUAGE_NONE][0]['safe_value'];
    if (substr($url, 0, 7) != 'http://') {
      $url = 'http://' . $url;
    }
    $variables['company_contact_website'] = l($url, $url, array(
      'attributes' => array(
        'target' => '_blank',
        'itemprop' => 'url'
      )
    ));
  }

  if (!empty($node->field_company_phone[LANGUAGE_NONE][0]['safe_value'])) {
    $variables['company_contact_phone'] = t('Tel: !phone', array('!phone' => '<span itemprop="telephone">' . $node->field_company_phone[LANGUAGE_NONE][0]['safe_value'] . '</span>'));
  }

  if (!empty($node->field_company_gsm[LANGUAGE_NONE][0]['safe_value'])) {
    $variables['company_contact_mobile'] = t('Gsm: !mobile', array('!mobile' => '<span itemprop="telephone">' . $node->field_company_gsm[LANGUAGE_NONE][0]['safe_value'] . '</span>'));
  }

  if (!empty($node->field_company_fax[LANGUAGE_NONE][0]['safe_value'])) {
    $variables['company_contact_fax'] = t('Fax: !fax', array('!fax' => '<span itemprop="faxNumber">' . $node->field_company_fax[LANGUAGE_NONE][0]['safe_value'] . '</span>'));
  }

  // Company direction (link to google map).
  $result = db_query("SELECT * FROM {geocodes} WHERE geocode = :id", array(':id' => $node->field_company_geocode[LANGUAGE_NONE][0]['value']))->fetchObject();
  if (is_object($result)) {
    $path = 'http://maps.google.com/maps?daddr=' . $result->y . ', ' . $result->x . ' (' . $node->title . ')';
    $variables['company_map_routing'] = l(t('Routebeschrijving'), $path, array('attributes' => array('target' => '_blank')));
  }

  // Company description.
  if (!empty ($node->body[LANGUAGE_NONE][0]['safe_value'])) {
    $variables['company_description'] = $node->body[LANGUAGE_NONE][0]['safe_value'];
  }

  // Check if FB description is available.
  if (!empty($node->social['description'])) {
    $variables['company_description'] = $node->social['description'];
  }

  // Company cover picture.
  if (!empty($node->field_company_cover_picture)) {
    $cover = $node->field_company_cover_picture[LANGUAGE_NONE][0];
    $variables['cover_picture'] = theme('image', array('path' => $cover['uri']));
  }
  // Check if FB cover image is available.
  if (!empty($node->social['cover'])) {
    // Override cover image.
    $variables['cover_picture'] = theme('image', array('path' => $node->social['cover']));
  }

  // Company photos.
  if (!empty($node->field_fotos)) {
    $variables['company_photos'] = array();
    $options = array(
      'html' => TRUE,
      'attributes' => array(
        'class' => 'colorbox',
        'rel' => 'gallery-123',
      )
    );
    foreach ($node->field_fotos[LANGUAGE_NONE] as $image) {
      $image_style = array(
        'style_name' => 'company_foto',
        'path' => $image['uri'],
        'width' => '',
        'height' => '',
      );
      $variables['company_photos'][] = l(theme('image_style', $image_style), file_create_url($image['uri']), $options);
    }
  }

  // Company hours.
  $variables['company_hours'] = array(
    'available' => FALSE,
    'days' => array(),
    'type' => NULL,
  );

  if (!empty($node->social['opening_hours'])) {
    $variables['company_hours']['available'] = TRUE;
    $variables['company_hours']['type'] = 'schematisch';
    foreach ($node->social['opening_hours'] as $data) {
      $day_output = theme('html_tag', array(
        'element' => array(
          '#tag' => 'div',
          '#attributes' => array(
            'class' => 'day-label',
          ),
          '#value' => t($data['label']),
        ),
      ));
      $openings_hour_output = $data[1]['open'] . ' - ' . $data[1]['close'];
      if (isset($data[2])) {
        $openings_hour_output .= '<br/>' . $data[2]['open'] . ' - ' . $data[2]['close'];
      }
      $day_output .= theme('html_tag', array(
        'element' => array(
          '#tag' => 'div',
          '#attributes' => array(
            'class' => 'day-info',
          ),
          '#value' => $openings_hour_output,
        ),
      ));

      // Wrap day output into a clearfix.
      $day_output = theme('html_tag', array(
        'element' => array(
          '#tag' => 'div',
          '#attributes' => array(
            'class' => 'clearfix',
          ),
          '#value' => $day_output,
        ),
      ));
      $variables['company_hours']['days'][] = $day_output;
    }
  }
  elseif (!empty ($node->hours)) {
    $holiday = (!empty($node->hours['first-holiday-start']) && !empty($node->hours['first-holiday-end']));
    if ($node->hours['status'] != 'niet van toepassing' || $holiday && strtotime($node->hours['first-holiday-end']) > date('U')) {
      $variables['company_hours']['available'] = TRUE;
      $variables['company_hours']['type'] = $node->hours['status'];
      if ($node->hours['status'] == 'schematisch') {
        foreach ($node->hours as $day => $data) {
          if (!is_array($data) || !isset($data['status'])) {
            continue;
          }
          $openings_hour_output = '';
          if ($data['status'] == 'open') {
            $from = $data['from_hour'] . ':' . $data['from_minute'];

            if ($data['from_hour'] == 'HH') {
              $from = '...';
            }
            $to = $data['to_hour'] . ':' . $data['to_minute'];

            if ($data['to_hour'] == 'HH') {
              $to = '...';
            }

            $openings_hour_output .= $from . ' - ' . $to;

            if ($data['break']) {
              $break_from = ($data['break_from_hour'] == 'HH' ? '...' : $data['break_from_hour'] . ':' . $data['break_from_minute']);
              $break_to = ($data['break_to_hour'] == 'HH' ? '...' : $data['break_to_hour'] . ':' . $data['break_to_minute']);
              $openings_hour_output .= '<br/>' . $break_from . ' - ' . $break_to;
            }
          }
          elseif ($data['status'] == 'appointment') {
            $openings_hour_output .= t('Op afspraak');

          }
          elseif ($data['status'] == 'closed') {
            $openings_hour_output .= t('Gesloten');

          }
          else {
            $openings_hour_output .= '-';
          }

          $day_output = theme('html_tag', array(
            'element' => array(
              '#tag' => 'div',
              '#attributes' => array(
                'class' => 'day-label',
              ),
              '#value' => t(ucfirst($day)),
            ),
          ));

          $day_output .= theme('html_tag', array(
            'element' => array(
              '#tag' => 'div',
              '#attributes' => array(
                'class' => 'day-info',
              ),
              '#value' => $openings_hour_output,
            ),
          ));

          // Wrap day output into a clearfix.
          $day_output = theme('html_tag', array(
            'element' => array(
              '#tag' => 'div',
              '#attributes' => array(
                'class' => 'clearfix',
              ),
              '#value' => $day_output,
            ),
          ));
          $variables['company_hours']['days'][] = $day_output;
        }


      }
      $variables['company_hours']['free_text'] = is_array($node->hours['free-text']) ? nl2br($node->hours['free-text']['value']) : nl2br($node->hours['free-text']);
    }
  }
  // Company social links.

  if (!empty($node->field_company_social)) {
    $links = array();
    foreach ($node->field_company_social['und'] as $collection_id) {
      $collection_item = field_collection_item_load($collection_id['value']);
      if ($collection_item && !empty($collection_item->field_social_url[LANGUAGE_NONE][0]['url'])) {
        $link_options = array(
          'type' => $collection_item->field_social_type[LANGUAGE_NONE][0]['value'],
          'url' => parse_url($collection_item->field_social_url[LANGUAGE_NONE][0]['url'], PHP_URL_SCHEME) == '' ? '//' . $collection_item->field_social_url[LANGUAGE_NONE][0]['url'] : $collection_item->field_social_url[LANGUAGE_NONE][0]['url'],
        );
        $links[] = drk_base_omega_render_social_link($link_options);
      }
    }
    $variables['company_social'] = $links;
  }
}

/**
 * Helper function that renders a single social link.
 *
 * @param array $options
 *   A keyed array.
 *   - type: The social link type; f.e. facebook, google+, etc.
 *   - url: The absolute URL to the social profile.
 *
 * @return string
 *   A rendered link.
 */
function drk_base_omega_render_social_link($options) {
  //@TODO: Handle social icons.
  return l($options['type'], $options['url'], array(
    'absolute' => TRUE,
    'attributes' => array(
      'class' => strtolower($options['type']),
      'target' => '_blank',
    )
  ));
}

/**
 * Helper function drk_base_omega_preprocess_node_homepage.
 *
 * Split field_spotlights_item into two seperate variables.
 *
 */
function drk_base_omega_preprocess_node_homepage(&$variables) {
  // Split field into three seperate blocks.
  if (isset($variables['content']['field_spotlights_item'])) {
    $variables['content']['field_spotlights_item_first'] = $variables['content']['field_spotlights_item'][0];
    $variables['content']['field_spotlights_item_second'] = $variables['content']['field_spotlights_item'][1];
    $variables['content']['field_spotlights_item_third'] = $variables['content']['field_spotlights_item'][2];
  }

}

/**
 * Helper function drk_base_omega_preprocess_node_service.
 *
 * Split field_lp_spotlights_visual into three seperate variables.
 * Change image style for first two fields.
 *
 */
function drk_base_omega_preprocess_node_service(&$variables) {

  // Filter out fields.
  $services = element_children($variables['content']['field_service']);

  //check if there are services
  if (empty($services) || !is_array($services)) {
    return;
  }

  $services = array_intersect_key($variables['content']['field_service'], $services);

  if (!empty($services)) {

    // Split first field.
    $variables['content']['field_service_first'] = "";
    $variables['content']['field_service_first'] = array_shift($services);
    $variables['content']['field_service_first']['field_lijstafbeelding'][0]['#image_style'] = "banner_460_175";
    $variables['content']['field_service_first']['#prefix'] = "<div class='service-item service-item-big'>";
    $variables['content']['field_service_first']['#suffix'] = "</div>";

    // Split second field.
    $variables['content']['field_service_second'] = "";
    $second = array_shift($services);
    if (!empty($second)) {
      $variables['content']['field_service_second'] = $second;
      $variables['content']['field_service_second']['field_lijstafbeelding'][0]['#image_style'] = "banner_460_175";
      $variables['content']['field_service_second']['#prefix'] = "<div class='service-item service-item-big'>";
      $variables['content']['field_service_second']['#suffix'] = "</div>";
    }

    if (!empty($services)) {

      foreach ($services as $service) {
        $service['#prefix'] = "<div class='service-item service-item-small'>";
        $service['#suffix'] = "</div>";
        $variables['content']['field_service_other'][] = $service;
      }

    }

  }

}

/**
 * Helper function drk_base_omega_preprocess_node_nieuws.
 *
 * Add extra comment count information.
 *
 */
function drk_base_omega_preprocess_node_nieuws(&$variables) {

  //$variables['content']['field_comment_count_text']['#markup'] = format_plural($variables['comment_count'], '1 reaction', '@count reactions');

}

/**
 * Helper function drk_base_omega_preprocess_node_shortcut.
 *
 * Hide title & alter image when referencing a shortcut.
 *
 */
function drk_base_omega_preprocess_node_shortcut(&$variables) {

  $variables['show_title'] = TRUE;

  if (isset($variables['referencing_entity']->type) && $variables['referencing_entity']->type == 'homepage' && $variables['referencing_field'] == 'field_news_item' ||
    isset($variables['referencing_entity']->type) && $variables['referencing_entity']->type == 'landing-page-featured' && $variables['referencing_field'] == 'field_lp_spotlights_visual'
  ) {

    $variables['show_title'] = FALSE;

    // Change to image style which only scales in width.
    if (!empty($variables['content']['field_lijstafbeelding'])) {
      $variables['content']['field_lijstafbeelding'][0]['#image_style'] = "halve_pagina_240";
    }

  }

}

/**
 * Helper function drk_base_omega_preprocess_node_theme_hook_suggestions.
 *
 * Add extra theme hook suggestions.
 *
 */
function drk_base_omega_preprocess_node_theme_hook_suggestions(&$variables) {

  $sanitized_view_mode = strtr($variables['view_mode'], '.', '_');
  $sanitized_node_type = strtr($variables['type'], '.', '_');

  $variables['theme_hook_suggestions'][] = 'node__' . $sanitized_node_type . '__' . $sanitized_view_mode;
  $variables['theme_hook_suggestions'][] = 'node__' . $sanitized_view_mode;

}

/**
 * Helper function drk_base_omega_preprocess_node_hide_location.
 *
 * Hide locations block.
 *
 */
function drk_base_omega_preprocess_node_hide_location(&$variables) {

  if (!empty($variables['content']['locations'])) {
    hide($variables['content']['locations']);
  }

}

/**
 * Helper function drk_base_omega_preprocess_node_add_classes.
 *
 * Add classes to node.
 *
 */
function drk_base_omega_preprocess_node_add_classes(&$variables) {

  switch ($variables['type']) {
    case 'service':
      $variables['classes_array'][] = "content";
      $variables['classes_array'][] = "container";
      break;
    case 'openingsuren':
      if ($variables['view_mode'] === 'full') {
        $variables['classes_array'][] = "centered";
        $variables['classes_array'][] = "content";
        $variables['classes_array'][] = "container";
      }
      break;
    case 'landing_page_featured':
    case 'landing_page_service':
    case 'homepage':
    case 'library_page':
      $variables['classes_array'][] = "content";
      break;
    default:
      $variables['classes_array'][] = "content";
      $variables['classes_array'][] = "container";
      $variables['classes_array'][] = "centered";
      break;
  }

}

/**
 * Helper function drk_base_omega_preprocess_node_hide_statistics.
 *
 * Hide statistics.
 *
 */
function drk_base_omega_preprocess_node_hide_statistics(&$variables) {

  unset($variables['content']['links']);

}

/**
 * Callback function that preprocesses library page nodes.
 */
function drk_base_omega_preprocess_node_library_page(&$variables) {
  $variables['spotlight_background_style'] = 'fullwidth';

  if (!empty($variables['content']['field_spotlight_background_style'])) {
    if (!empty($variables['content']['field_spotlight_background_style']['#items'][0]['value'])) {
      $variables['spotlight_background_style'] = $variables['content']['field_spotlight_background_style']['#items'][0]['value'];
    }
  }

  $variables['spotlight_background_align'] = 'align-right';

  if (!empty($variables['content']['field_spotlight_background_align'])) {
    if (!empty($variables['content']['field_spotlight_background_align']['#items'][0]['value'])) {
      $variables['spotlight_background_align'] = $variables['content']['field_spotlight_background_align']['#items'][0]['value'];
    }
  }
}
