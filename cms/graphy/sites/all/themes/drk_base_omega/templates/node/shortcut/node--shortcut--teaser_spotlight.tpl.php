<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>
<?php
if (!empty($node_url)) {
  $title = "<a href='" . $node_url ."'>" . $title . "</a>";
}
?>

<div class="shortcut shortcut-notitle">

  <?php if ($show_title): ?>
    <h3>
      <?php print $title; ?>
    </h3>
  <?php endif; ?>

  <?php if (!empty($content['field_lijstafbeelding'])): ?>

    <figure>
      <?php if (!empty($node_url)) : ?>
        <a href='<?php print $node_url; ?>'>
      <?php endif; ?>
      <?php print render($content['field_lijstafbeelding']); ?>
      <?php if (!empty($node_url)) : ?>
        </a>
      <?php endif; ?>
    </figure>

  <?php endif ?>

</div>
