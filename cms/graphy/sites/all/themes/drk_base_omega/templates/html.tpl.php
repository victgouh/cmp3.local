<!DOCTYPE html>
<html <?php print $rdf_namespaces; ?> class="no-js" lang="<?php print $language->language; ?>">
  <head>
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>

    <link rel="shortcut icon" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/favicon.ico"/>

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/apple-touch-icon-180x180.png">

    <link rel="icon" type="image/png" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/favicon-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/favicon-160x160.png" sizes="160x160">
    <link rel="icon" type="image/png" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/assets/img/icon/favicon-32x32.png" sizes="32x32">


    <meta name="msapplication-TileColor" content="#FFF">
    <meta name="msapplication-TileImage" content="<?php echo url(drupal_get_path('theme', variable_get('theme_default', NULL)), array("absolute" => true)); ?>/mstile-144x144.png">

    <!--[if(lt IE 9)]>
      <script src="<?php echo url(drupal_get_path('theme', 'drk_base_omega'), array("absolute" => true)); ?>/assets/js/vendor/html5shiv.min.js"></script>
    <![endif]-->

    <?php print $head_scripts; ?>
    <?php print $styles; ?>

    <script id="openinghour-label" type="text/template">
        <div class="openinghour state <%- state %> <%- id %>"><%- text %></div>
    </script>
  </head>

  <body<?php print $attributes;?>>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>


    <?php print $scripts; ?>

    <!--[if(lt IE 9)]>
      <script src="<?php echo url(drupal_get_path('theme', 'drk_base_omega'), array("absolute" => true)); ?>/assets/js/vendor/selectivizr.min.js"></script>
      <script src="<?php echo url(drupal_get_path('theme', 'drk_base_omega'), array("absolute" => true)); ?>/assets/js/vendor/respond.min.js"></script>
    <![endif]-->

  </body>
</html>
