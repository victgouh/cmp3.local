<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>
<?php
if (!empty($node_url)) {
  $title = "<a href='" . $node_url ."'>" . $title . "</a>";
}
?>

<h3>
  <?php print $title; ?>
</h3>

<?php if (!empty($content['field_lijstafbeelding'])): ?>
  <figure>
    <?php print render($content['field_lijstafbeelding']); ?>
  </figure>
<?php endif ?>
