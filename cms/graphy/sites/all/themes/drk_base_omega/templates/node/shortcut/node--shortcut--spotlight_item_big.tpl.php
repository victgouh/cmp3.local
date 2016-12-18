<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>
<?php
if (!empty($node_url)) {
  if(isset($content['field_link'][0]['#element']['attributes']['target']) && $content['field_link'][0]['#element']['attributes']['target'] == '_blank'){

    $title = "<a href='" . $node_url ."' target='_blank'>" . $title . "</a>";
  }else{
    $title = "<a href='" . $node_url ."'>" . $title . "</a>";
  }
}

?>

<div class="shortcut">

  <h2>
    <?php print $title; ?>
  </h2>

</div>