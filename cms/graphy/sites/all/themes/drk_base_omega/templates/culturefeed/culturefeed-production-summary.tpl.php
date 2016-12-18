<?php
/**
 * @file
 * Template for the summary of a production.
 * Please don't remove the cf- prefixed id's. This is used by GTM for user behavior tracking.
 * Some day your client will benefit from our aggregated insights & benchmarks too.
 * See https://github.com/cultuurnet/culturefeed/wiki/Culturefeed-tracking
 * Thanks!
 */
?>

<div class="event-teaser">
  <div class="content">
    <h2><?php print culturefeed_search_detail_l('production', $cdbid, $title, decode_entities($title), array('attributes' => array('id' => 'cf-title_' . $cdbid))); ?></h2>

    <dl class="clearfix">
      <?php if ($shortdescription): ?>
      <p><?php print $shortdescription; ?></p>
      <?php endif; ?>
      <?php if ($location): ?>
      <dt><?php print t('Where'); ?></dt>
      <dd><?php if (!empty($location['title'])): print $location['title']; endif; ?> <?php if (!empty($location['city']) && !(strpos($location['title'], $location['city'], strlen($location['title']) - strlen($location['city'])))): print $location['city']; endif; ?></dd>
      <?php endif; ?>

      <dt><?php print t('When'); ?></dt>
    <?php if ($calendar['type'] == 'timestamps'): ?>
      <?php if (count($calendar['timestamps']) > 0): ?>
        <?php foreach ($calendar['timestamps'] as $timestamp): ?>
          <?php if (isset($timestamp['begintime'])): ?>
            <?php if (!is_array($timestamp['begintime'])): ?>
              <?php if (isset($timestamp['endtime'])): ?>
                <dd><?php print $timestamp['date'] . ' ' . t('from') . ' ' . $timestamp['begintime'] . ' ' . t('to') . ' ' . $timestamp['endtime']; ?></dd>
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

      <?php if (!empty($perfomers)): ?>
      <dt><?php print t('With'); ?></dt>
      <dd><?php print $perfomers; ?></dd>
      <?php endif; ?>

    </dl>

    <?php if (!empty($tickets)): ?>
      <?php print culturefeed_search_detail_l('production', $cdbid, $title, t('Info & tickets'), array('attributes' => array('id' => 'cf-readmore_' . $cdbid))); ?>
    <?php else: ?>
      <?php print culturefeed_search_detail_l('production', $cdbid, $title, t('More info'), array('attributes' => array('id' => 'cf-readmore_' . $cdbid))); ?>
    <?php endif; ?>

  </div>

  <div class="thumb">
    <?php if (!empty($thumbnail)): ?>
      <?php print culturefeed_search_detail_l('production', $cdbid, $title, '<img src="' . $thumbnail . '?width=320&height=240&crop=auto" />', array('attributes' => array('id' => 'cf-image_' . $cdbid), 'html' => TRUE)); ?>
    <?php endif; ?>
  </div>
</div>
