<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>
<?php
if (!empty($node_url)) {
  $title = "<a href='" . $node_url ."'>" . $title . "</a>";
}
?>

<?php if($referencing_field == 'field_lp_spotlights_visual') : ?>

  <?php if (!empty($content['field_lijstafbeelding'])): ?>
    <figure>
      <?php if (!empty($node_url)) : ?>
      <a href='<?php print $node_url; ?>'>
      <?php endif; ?>
      <?php print render($content['field_lijstafbeelding']); ?>
      <?php if (!empty($node_url)) : ?>
      </a>
      <?php endif; ?>

    <figcaption class="p15 title-icon">
      <h3>
        <a href="<?php print $node_url; ?>">
          <?php print $title; ?>
        </a>
      </h3>
    </figcaption>
    </figure>

  <?php endif ?>
<?php else: ?>

  <div class="shortcut title-icon">
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

<?php endif; ?>
