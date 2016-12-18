<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<div<?php print $attributes; ?>>
  <?php if( !empty($content["field_opening_hours_higlighted"]) ) : ?>
  <div id="opening_hours_higlighted">
    <div class="centered container">
      <?php print render($content["field_opening_hours_higlighted"]); ?>
    </div>
  </div>
<?php endif; ?>

  <div id="articles_spotlight" class="centered container">
    <?php print render($content["field_lp_spotlights_visual_items"]); ?>
  </div>

  <?php if( !empty($content["field_block"]) ) : ?>
    <div id="agenda" class="container">
      <?php if( !empty($content["field_block_title"]) ) : ?>
        <div class="centered">
          <?php print render($content["field_block_title"]); ?>
        </div>
      <?php endif; ?>
      <?php print render($content["field_block"]); ?>
    </div>
  <?php endif; ?>

  <?php if( !empty($content["field_lp_spotlights_teaser_items"]) ) : ?>
  <div id="articles_teaser" class="centered container">
    <?php print render($content["field_lp_spotlights_teaser_items"]); ?>
  </div>
  <?php endif; ?>

</div>
