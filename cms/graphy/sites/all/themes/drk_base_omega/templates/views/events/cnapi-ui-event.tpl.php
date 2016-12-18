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

    <div
      class="description"><?php print (!empty($longdescription) ? $longdescription : $shortdescription); ?></div>

    <?php if (!empty($price)) : ?>
      <h2><?php print t('Prijsinformatie'); ?></h2>
      <p><?php print $price; ?></p>
    <?php endif; ?>

    <?php if (!empty($organiser) && !$location_is_organiser) : ?>
      <h2><?php print t('Organisatie'); ?></h2>
      <p><?php print (!empty($organiser['link']) ? $organiser['link'] : $organiser['title']); ?></p>
    <?php endif; ?>

    <?php if (!empty($reservation)) : ?>
      <h2><?php print t('Reservaties'); ?></h2>
      <p>
        <?php print (!empty($reservation['mail']) ? t('Mail') . ':' . $reservation['mail'] : ''); ?>
        <?php print '<br />'; ?>
        <?php print (!empty($reservation['phone']) ? t('Telefoon') . ':' . $reservation['phone'] : ''); ?>
        <?php print '<br />'; ?>
        <?php print (!empty($reservation['fax']) ? t('Fax') . ':' . $reservation['fax'] : ''); ?>
      </p>
    <?php endif; ?>

    <?php if (!empty($contact)) : ?>
      <h2><?php print t('Contact'); ?></h2>
      <p>
        <?php print (!empty($contact['mail']) ? t('Mail') . ':' . $contact['mail'] : ''); ?>
        <?php print '<br />'; ?>
        <?php print (!empty($contact['phone']) ? t('Telefoon') . ':' . $contact['phone'] : ''); ?>
        <?php print '<br />'; ?>
        <?php print (!empty($contact['fax']) ? t('Fax') . ':' . $contact['fax'] : ''); ?>
      </p>
    <?php endif; ?>

    <?php if (!empty($performers)) : ?>
      <h2><?php print t('Uitvoerder'); ?></h2>
      <p><?php print implode(', ', $performers); ?></p>
    <?php endif; ?>

    <?php if (!empty($links)) : ?>
      <h2><?php print t('Zie ook'); ?></h2>
      <p><?php print implode(', ', $links); ?></p>
    <?php endif; ?>

  </div>
</article>
