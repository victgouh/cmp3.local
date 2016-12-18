<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php if (!empty($content['field_lijstafbeelding'])): ?>
  <figure>
    <?php print render($content['field_lijstafbeelding']); ?>
    <figcaption class="bgc-color-white p15 date-icon title-icon no-date">
      <h3>
        <a href="<?php print $node_url; ?>">
          <?php print $title; ?>
        </a>
      </h3>
    </figcaption>
  </figure>

<?php else: ?>
  <div class="bgc-color-white p15 date-icon title-icon no-date">
    <h3>
      <a href="<?php print $node_url; ?>">
        <?php print $title; ?>
      </a>
    </h3>
  </div>
<?php endif ?>
