<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php print render($content['field_open_hours_highl_title']); ?>

<div class="info bgc-color-white p15">
  <h4 class="day"><?php print t('Vandaag'); ?></h4>
  <?php print render($content['field_open_hours_highl_ref']); ?>
  <?php print render($content['field_open_hours_highl_more']); ?>
</div>
