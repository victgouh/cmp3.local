<?php

/**
 * @file
 * Default simple view template to display a list of summary lines.
 *
 * @ingroup views_templates
 */

?>

<?php

$letters = array(
  'A',
  'B',
  'C',
  'D',
  'E',
  'F',
  'G',
  'H',
  'I',
  'J',
  'K',
  'L',
  'M',
  'N',
  'O',
  'P',
  'Q',
  'R',
  'S',
  'T',
  'U',
  'V',
  'W',
  'X',
  'Y',
  'Z'
);
$items = array();
foreach ($letters as $letter) {
  $items[$letter] = array('title' => $letter, 'href' => '', 'count' => 0);
}

foreach ($rows as $row) {

  $_title = '';
  if(isset($row->common_title_field)) {
    $_title = $row->common_title_field;
  } elseif(isset($row->title_truncated)) {
    $_title = $row->title_truncated;
  }

  if (trim($_title) != '') {

    $path = $row->url;

    $class = '';
    if ($_GET['q'] != "adressen" && (strpos($path, '/' . $_GET['q']) !== FALSE || ($path == '<front>' && drupal_is_front_page()))) {
      $class = 'active';
    }

    $items[$_title]['href'] = $row->url;
    $items[$_title]['count'] = $row->count;
    $items[$_title]['class'] = $class;

  }

}
?>

<ul class="pager az-pager views-summary">
  <?php foreach ($items as $id => $item): ?>
    <li>
      <?php if (!empty($item['href'])) : ?>
        <a href="<?php print $item['href']; ?>"<?php print !empty($item['class']) ? ' class="' . $item['class'] . '"' : ''; ?>>
          <?php print $id; ?>
        </a>
      <?php else : ?>
        <span><?php print $id; ?></span>
      <?php endif; ?>
    </li>
  <?php endforeach; ?>
</ul>
