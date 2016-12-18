<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>
<!--<?php print __FILE__; ?>-->

<?php
if (!empty($node_url)) {
  $title = "<a href='" . $node_url ."'>" . $title . "</a>";
}
?>

<div class="shortcut">

  <h3>
    <?php print $title; ?>
  </h3>

  <?php print render($content['body']); ?>

</div>
