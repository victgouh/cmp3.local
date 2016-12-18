<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<div<?php print $attributes; ?>>
  <div id="popular-services" class="centered container">
    <?php print render($content["field_lp_services_title"]); ?>
    <?php print render($content["field_lp_services_teaser"]); ?>
  </div>

  <div id="higlighted-service" class="centered container">
    <?php print render($content["field_service_title"]); ?>

    <div class="container">
      <div class="service-hours">
        <?php print render($content["field_subtitle_counter"]); ?>
        <h4><?php print t('Vandaag'); ?></h4>
        <?php print render($content["field_counters"]); ?>
      </div>

      <div class="contact">
        <?php print render($content["field_lp_hl_service"]); ?>
      </div>

      <div class="map-info">
        <?php print render($content["field_lp_hl_service_gmap"]); ?>
      </div>
    </div>
  </div>

  <?php if(!empty($content["field_spotlights"])): ?>
  <div id="spotlight" class="centered container">
    <?php print render($content["field_spotlights"]); ?>
  </div>
  <?php endif; ?>
</div>
