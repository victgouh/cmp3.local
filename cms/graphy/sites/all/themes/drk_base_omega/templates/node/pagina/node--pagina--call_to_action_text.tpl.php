<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<h3>
  <a href="<?php print $node_url; ?>">
    <?php print $title; ?>
  </a>
</h3>

<?php print render($content['body']); ?>
