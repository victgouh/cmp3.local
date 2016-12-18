<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<div>
  <dl>
    <dt>
      <a href="<?php print $node_url; ?>">
        <?php print $title; ?>
      </a>
    </dt>
    <dd>
      <?php print render($content["openinghours_status_now"]); ?>
      <?php print render($content["opening_hours_status_today"]); ?>
    </dd>
  </dl>
</div>
