<?php
/**
 * @file
 * Template file for vereniging teasers.
 */
?>

<?php
  if (empty($content['field_telefoon'][0]['#markup'])) {
    hide($content['field_telefoon']);
  }
  if (empty($content['field_e_mailadres'][0]['#markup'])) {
    hide($content['field_e_mailadres']);
  }
?>

<div class="teaser teaser-vereniging">
  <h3>
    <?php print $title; ?>
  </h3>

  <div class="container content">
    <?php print render($content); ?>
  </div>

  <div class="container more">
    <?php print l(t('Read more'), "node/" . $node->nid); ?>
  </div>
</div>
