<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<div class="title">
  <a href="<?php print $node_url; ?>">
    <?php print $title; ?>
  </a>
</div>

<div class="hours-info">
  <?php print render($content["openinghours_status_now"]); ?>
  <?php print render($content["openinghours_status_today_now"]); ?>
</div>
