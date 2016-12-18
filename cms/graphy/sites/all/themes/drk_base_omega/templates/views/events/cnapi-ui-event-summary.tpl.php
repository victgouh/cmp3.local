<?php if (theme_get_setting('themer_helper')) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<article<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>

    <?php if (!empty($location['address'])) : ?>
      <div class="label"><?php print t('Waar') . ':'; ?></div>
      <div class="value"><?php print $location['address']; ?></div>
    <?php endif; ?>

    <?php if (!empty($when)) : ?>
      <div class="label"><?php print t('Wanneer') . ':'; ?></div>
      <div
        class="value"><?php print $when . (!empty($more_data) ? $more_data : ''); ?></div>
    <?php endif; ?>

    <?php if (!empty($images[0])) : ?>
      <div class="image"><?php print $images[0]['image']; ?></div>
    <?php endif; ?>

    <div class="description"><?php print $shortdescription; ?></div>

  </div>
</article>