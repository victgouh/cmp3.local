<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php
  hide($content['comments']);
  hide($content['links']);
?>

<article<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <?php print render($content); ?>
  </div>
</article>
