<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<h3>
  <a href="<?php print $node_url; ?>">
    <?php print $title; ?>
  </a>
</h3>

<?php if (!empty($content['field_lijstafbeelding'])): ?>
  <figure class="date-top-left">
    <?php print render($content['field_lijstafbeelding']); ?>

    <?php if (!empty($content['field_datum']) ):  ?>
      <?php print render($content['field_datum']); ?>
    <?php endif; ?>

  </figure>
<?php endif ?>

