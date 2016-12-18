<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<figure class="cta cta-service">
  <?php print render($content['field_lijstafbeelding']); ?>

  <figcaption class="caption">
    <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
  </figcaption>
</figure>
