<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>
<?php print render($content['field_datum']); ?>

<h2>
  <a href="<?php print $node_url; ?>">
    <?php print $title; ?>
  </a>
</h2>
