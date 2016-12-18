<?php foreach ($items as $delta => $item): ?>
<div class="field--faciliteiten">
  <?php if (!$label_hidden): ?>
    <div class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</div>
  <?php endif; ?>
  <?php print render($item); ?>
</div>
<?php endforeach; ?>
