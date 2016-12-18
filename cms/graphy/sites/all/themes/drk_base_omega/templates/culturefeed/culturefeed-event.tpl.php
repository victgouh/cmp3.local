<?php
/**
 * @file
 * Template for the detail of an event.
 */
?>
<article class="event content container mb20">

  <?php if (!empty($shortdescription)): ?>
    <p><?php print $shortdescription; ?></p>
    <br>
  <?php endif ?>


  <?php if (!empty($main_picture)): ?>
    <figure>
      <img src="<?php print $main_picture; ?>?width=470&crop=auto"/>

      <?php foreach ($pictures as $picture): ?>
        <img src="<?php print $picture; ?>?width=160&crop=auto"/>
      <?php endforeach; ?>
    </figure>
  <?php endif; ?>

  <dl class="event-info clearfix">
    <?php if ($location): ?>
      <dt><?php print t('Where'); ?></dt>
      <dd>
        <?php if (!empty($location['link'])): ?>
          <?php print $location['link']; ?><br/>
        <?php else: ?>
          <?php print $location['title']; ?><br/>
        <?php endif; ?>
        <?php if (!empty($location['street'])): ?>
          <?php print $location['street'] ?>,
        <?php endif; ?>
        <?php if (!empty($location['zip'])): ?>
          <?php print $location['zip']; ?>
        <?php endif; ?>
        <?php if (!empty($location['city'])): ?>
          <?php print $location['city']; ?>
        <?php endif; ?>
      </dd>
    <?php endif; ?>

  <dt><?php print t('When'); ?></dt>
    <?php if ($calendar['type'] == 'timestamps'): ?>
      <?php if (count($calendar['timestamps']) > 0): ?>
        <?php foreach ($calendar['timestamps'] as $timestamp): ?>
          <?php if (isset($timestamp['begintime'])): ?>
            <?php if (!is_array($timestamp['begintime'])): ?>
              <?php if (isset($timestamp['endtime'])): ?>
                <dd><?php print $timestamp['date'] . ' ' . t('from') . ' ' . $timestamp['begintime'] . ' ' . t('to') . $timestamp['endtime']; ?></dd>
              <?php else: ?>
                <dd><?php print $timestamp['date'] . t(' at ') . $timestamp['begintime']; ?></dd>
            <?php endif; ?>
            <?php else: ?>
              <?php $i = 0; ?>
              <dd><?php print $timestamp['date'] . t(' at '); ?>
                <?php foreach ($timestamp['begintime'] as $begintime): ?>
                  <?php print $begintime; ?>
                  <?php if (++$i !== count($timestamp['begintime'])): ?>
                    <?php print ' | '; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </dd>
            <?php endif; ?>
          <?php else: ?>
            <dd><?php print $timestamp['date']; ?></dd>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <dd><?php print t('This event is finished.'); ?></dd>
      <?php endif; ?>
    <?php else: ?>
      <dd><?php print $when; ?></dd>
    <?php endif; ?>

    <?php if ($organiser): ?>
      <dt><?php print t('Organization'); ?></dt>
      <dd>
        <?php if (empty($organiser['link'])): ?>
          <?php print $organiser['title']; ?>
        <?php else: ?>
          <?php print $organiser['link'] ?>
        <?php endif; ?>
      </dd>
    <?php endif; ?>

    <?php if (!empty($price)): ?>
      <dt><?php print t('Price'); ?></dt>
      <dd><?php print $price . ' '; ?><?php print $price_description; ?></dd>
    <?php endif; ?>

    <?php if (!empty($reservation) || !empty($tickets)) : ?>
      <dt><?php print t('Reservation'); ?></dt>
      <dd>
        <?php if (!empty($tickets)) : ?>
          <?php print implode(', ', $tickets) ?><br/>
        <?php endif; ?>
        <?php if (!empty($reservation['mail'])) : ?>
          <?php print $reservation['mail'] ?><br/>
        <?php endif; ?>
        <?php if (!empty($reservation['url'])) : ?>
          <?php print $reservation['url'] ?><br/>
        <?php endif; ?>
        <?php if (!empty($reservation['phone'])) : ?>
          <?php print t('Phone'); ?>: <?php print $reservation['phone'] ?><br/>
        <?php endif; ?>
      </dd>
    <?php endif; ?>

    <?php if (!empty($contact['mail']) || !empty($contact['phone']) || !empty($contact['fax'])) : ?>
      <dt><?php print t('Contact'); ?></dt>
      <dd>
        <?php if (!empty($contact['mail'])) : ?>
          <?php print $contact['mail'] ?><br/>
        <?php endif; ?>
        <?php if (!empty($contact['phone'])) : ?>
          <?php print t('Phone'); ?>: <?php print $contact['phone'] ?><br/>
        <?php endif; ?>
        <?php if (!empty($contact['fax'])) : ?>
          <?php print t('Fax'); ?>: <?php print $contact['fax'] ?>
        <?php endif; ?>
      </dd>
    <?php endif; ?>

    <?php if (!empty($agefrom)): ?>
      <dt><?php print t('Age'); ?></dt>
      <dd><?php print $agefrom; ?>+</dd>
    <?php endif; ?>

    <?php if (!empty($links)): ?>
      <dt><?php print t('Links'); ?></dt>
      <dd>
        <ul>
          <?php foreach ($links as $link): ?>
            <li><?php print $link; ?></li>
          <?php endforeach; ?>
        </ul>
      </dd>
    <?php endif; ?>
  </dl>

  <?php if (!empty($videos)): ?>
    <?php foreach ($videos as $video): ?>
      <?php print $video; ?>
    <?php endforeach; ?>
  <?php endif; ?>

  <?php print $recommend_link; ?>

  <?php if (!empty($longdescription)): ?>
    <div class="longdescription clear-both"><p><?php print $longdescription; ?></p></div>
  <?php endif ?>

</article>
