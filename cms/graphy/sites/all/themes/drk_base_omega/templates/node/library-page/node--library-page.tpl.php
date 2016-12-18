<div<?php print $attributes; ?>>
  <div id="banner" class="<?php echo $spotlight_background_style; ?> <?php echo $spotlight_background_align; ?>">
    <?php print render($content["field_spotlight_background"]); ?>
    <div class="container">
      <div class="banner-title">
        <?php print render($content["field_spotlight_background"]); ?>
        <?php print render($content["field_spotlight_item"]); ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="left">
      <?php print render($content["field_extend_url"]); ?>
    </div>
    <div class="right">
      <?php
      $block = module_invoke('feature_drk7_library_page', 'block_view', 'library_catalog');
      print render($block['content']);
      ?>
    </div>
  </div>
  <div class="libraries">
    <h1><?php print $title; ?></h1>
    <?php print render($content['field_libraries']); ?>
  </div>
  <div class="services">
    <?php print render($content['field_services']); ?>
  </div>
  <div class="spotlight">
    <?php print render($content['field_fc_spotlight_item']); ?>
  </div>
</div>
<div class="culturefeed">
  <h3>UiT in Kortrijk</h3>
  <?php
  $block = module_invoke('quicktabs', 'block_view', 'vrije_tijd_agenda_bib');
  print render($block['content']);
  ?>
</div>
<div<?php print $attributes; ?>>
  <?php print render($content['field_lp_spotlights_teaser_items']); ?>
</div>
