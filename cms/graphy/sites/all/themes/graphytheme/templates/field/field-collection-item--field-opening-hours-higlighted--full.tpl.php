<?php if( theme_get_setting('themer_helper')) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php print render($content['field_open_hours_highl_title']); ?>

<div class="info lined bgc-color-white p15">
  <h6 class="day left color-second"><?php print t('Vandaag'); ?></h6>
  <?php print render($content['field_open_hours_highl_ref']); ?>
  <?php print render($content['field_open_hours_highl_more']); ?>
</div>
