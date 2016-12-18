<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php
  $per_page = 48;
  $images = array_chunk($field_image, $per_page);
  $pager_page = isset($_GET['page']) ? $_GET['page'] : 0;
?>

<article<?php print $attributes; ?>>
  <?php if ($page): ?>
    <div<?php print $content_attributes; ?>>
      <?php print render($content['body']);?>
    </div>
  <?php endif; ?>

  <div>
    <a name="gallery"></a>
    <ul class="gallery clearfix">
      <?php foreach ($images[$pager_page] as $image) : ?>
        <?php
          $title = '';
          if (isset($image['field_image_description']['und'][0]['value'])) {
            $title .= $image['field_image_description']['und'][0]['value'];
          }
          if (isset($image['field_image_copyright']['und'][0]['value'])) {
            $title .= "&copy; " . $image['field_image_copyright']['und'][0]['value'];
          }
        ?>
        <li>
          <a href="<?php print file_create_url($image['uri']); ?>"
             class="colorbox" rel="gallery-<?php print $node->nid; ?>"
             title="<?php print $title; ?>">
            <img src="<?php print image_style_url('banner_340_230', $image['uri']); ?>" alt="<?php print $title; ?>"/>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <?php
      if (count($images) > 1) {
        $current_page = pager_default_initialize(count($field_image), $per_page);
        print theme('pager');
      }
    ?>
  </div>

  <?php print render($content['related_items']);?>
</article>
