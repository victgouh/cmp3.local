<?php
/**
 * @file
 * Template for the summary of an event.
 */
?>

<?php print $event_date; ?>

<?php if (!empty($main_picture)): ?>
  <figure>
    <a href="<?php print $url ?>">
      <img src="<?php print $main_picture; ?>?width=320&height=180&crop=auto"/>
    </a>
  </figure>
<?php endif; ?>

<h3>
  <a href="<?php print $url ?>"><?php print $title; ?></a>
</h3>
