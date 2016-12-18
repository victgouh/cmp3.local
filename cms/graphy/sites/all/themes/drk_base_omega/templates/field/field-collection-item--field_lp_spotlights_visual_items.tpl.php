<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php print render($content["field_lp_spotlights_visual_title"]); ?>
<div class="wrapper">
  <?php print render($content["field_lp_spotlights_visual"]); ?>
</div>
