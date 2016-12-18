<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php
  // Hide items from content.
  hide($content['comments']);
  hide($content['links']);
?>

<article<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>

    <div class="container content">
      <?php print render($content);?>
    </div>

    <?php if (!empty($content['comments'])) : ?>
      <div class="comments">
        <?php print render($content['comments']) ?>
      </div>
    <?php endif; ?>

  </div>
</article>
