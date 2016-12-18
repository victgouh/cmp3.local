<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<div<?php print $attributes; ?>>


   <div id="banner" class="<?php echo $spotlight_background_style; ?> <?php echo $spotlight_background_align; ?>">
    <?php print render($content["field_spotlight_background"]); ?>

    <div class="container">

      <?php if( !empty($content["field_opening_hours_higlighted"]) ) : ?>
      <nav role="navigation" class="accordeon">
        <p class="accordeon-title"><?php print t('Openingsuren'); ?></p>
        <?php print render($content["field_opening_hours_higlighted"]); ?>
      </nav>
      <?php endif; ?>

      <div class="banner-title">
        <?php print render($content["field_spotlight_background"]); ?>
        <?php print render($content["field_spotlight_item"]); ?>
      </div>
    </div>
  </div>



  <div id="ctas" class="centered container">
    <nav role="navigation" class="plus-list">
      <?php print render($content["field_top_item"]); ?>
    </nav>

    <div class="justify-height cta-stacked">
      <?php print render($content["field_spotlights_item_first"]); ?>
    </div>

    <div class="justify-height cta-stacked">
      <?php print render($content["field_spotlights_item_second"]); ?>
    </div>

    <div class="justify-height cta-stacked last">
      <?php print render($content["field_spotlights_item_third"]); ?>
    </div>
  </div>

  <?php if( !empty($content["field_news_item"]) ) : ?>
  <div id="articles" class="centered container">
    <?php print render($content["field_news_item"]); ?>
  </div>
  <?php endif; ?>

  <?php if( !empty($content["field_block"]) ) : ?>
    <?php if( !empty($content["field_block_title"]) ) : ?>
      <div class="centered carrousel-title">
        <?php print render($content["field_block_title"]); ?>
      </div>
    <?php endif; ?>

    <div id="agenda">
      <?php print render($content["field_block"]); ?>
    </div>

    <?php if( !empty($content["field_block_url"]) ) : ?>
      <div class="centered carrousel-url">
        <?php print render($content["field_block_url"]); ?>
      </div>
    <?php endif; ?>
  <?php endif; ?>

</div>
