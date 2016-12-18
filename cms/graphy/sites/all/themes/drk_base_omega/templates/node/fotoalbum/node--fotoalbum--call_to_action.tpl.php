<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<figure class="cta cta-page">

  <?php if (!empty($content["field_lijstafbeelding"])) : ?>
    <?php print render($content['field_lijstafbeelding']); ?>
  <?php endif; ?>

  <figcaption class="caption">
    <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
  </figcaption>
</figure>
