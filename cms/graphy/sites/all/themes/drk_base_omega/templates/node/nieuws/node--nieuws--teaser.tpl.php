<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php
  // Hide items from content.
  hide($content['comments']);
  hide($content['links']);
?>

<h2>
  <a href="<?php print $node_url; ?>">
    <?php print $title; ?>
  </a>
</h2>

<div class="container spec">
  <?php print date('d/m/Y', $node->created); ?></li>
</div>

<div class="container content">
  <?php print render($content); ?>
</div>

<div class="container more">
  <?php print l(t('Read more'), "node/" . $node->nid); ?>
</div>
