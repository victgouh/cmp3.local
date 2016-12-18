<?php

function drk_base_omega_form_system_theme_settings_alter(&$form, $form_state) {

  $form['themer_helper'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Themer helper'),
    '#default_value' => theme_get_setting('themer_helper'),
    '#description'   => t('Adds a html comment in block, node, regions fields etc'),
  );

}

