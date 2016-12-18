<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>
<?php
if (!empty($node_url)) {
  $title = "<a href='" . $node_url ."'>" . $title . "</a>";
}
?>

<div class="shortcut">

  <figure class="cta cta-shortcut">

    <?php print render($content['field_lijstafbeelding']); ?>

    <figcaption class="caption">
      <?php print $title; ?>
    </figcaption>

  </figure>

</div>
