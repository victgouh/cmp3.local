<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<figure>
  <?php print render($content['field_lijstafbeelding']); ?>
  <?php print render($content['openinghours_status_now']); ?>

  <figcaption>
    <h3>
      <a href="<?php print $node_url; ?>">
        <?php print $title; ?>
      </a>
    </h3>

    <?php print render($content["opening_hours_comment"]); ?>
    <?php print render($content['field_openingsuren_reference']); ?>
  </figcaption>
</figure>
