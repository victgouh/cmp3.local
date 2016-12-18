<?php

/**
 * @file
 * Contains a pre-process hook for 'node'.
 */

/**
 * Implements hook_preprocess_field().
 */
function drk_base_omega_preprocess_field(&$variables) {

  switch ($variables["element"]["#field_name"]) {

    case "field_item_onder_inhoud":

      $variables["element"]["#label_display"] = "above";
      $variables["label_hidden"] = FALSE;
      $variables["label"] = t("Zie ook");

      $variables['classes_array'][] = 'related-items';
      break;

  }

}
