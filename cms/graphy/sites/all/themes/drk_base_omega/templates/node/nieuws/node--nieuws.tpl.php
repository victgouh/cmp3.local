<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php
  hide($content['comments']);
?>

<article<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>

    <?php if (!empty($content['field_datum']) ):  ?>
      <?php print render($content['field_datum']); ?>
    <?php endif; ?>

    <div class="container content mt20">

      <?php if (!empty($content['field_lijstafbeelding']) ):  ?>
        <div class="float-left margin-right margin-bottom" >
          <?php print render($content['field_lijstafbeelding']); ?>
        </div>
      <?php endif; ?>

      <?php print render($content); ?>
    </div>
    <div class="container create-date"><?php print t('Created at: ') . date('d/m/Y', $node->created); ?><br /><br /></div>
    <?php if (!empty($content['comments']['comment_form']) ) : ?>
      <div class="container comments">
        <?php
          print theme(
            'ctools_collapsible',
            array(
              'handle' => '<h2>' . t('Add new comment') . '</h2>',
              'content' => render($content['comments']),
              'collapsed' => TRUE
            )
          );
        ?>
      </div>
    <?php endif; ?>
  </div>
</article>
