<?php if( theme_get_setting('themer_helper') ): ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php
  hide($content['comments']);
  hide($content['links']);
?>

<?php print render($content); ?>
