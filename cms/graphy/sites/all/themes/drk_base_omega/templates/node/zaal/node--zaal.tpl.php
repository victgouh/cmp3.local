<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php
  // Hide items from content.
  hide($content['comments']);
  hide($content['links']);
?>

<article<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>

    <div class='container content'>

      <?php if( !empty($content['field_foto']) ) : ?>
        <div class='mb20'>
          <?php print render($content['field_foto']); ?>
        </div>
      <?php endif; ?>

      <?php if( !empty($content["group_faciliteiten"]) ) : ?>
        <div class="field-faciliteiten-wrapper mb5">
          <?php print render($content["group_faciliteiten"]); ?>
        </div>
      <?php endif; ?>

      <?php if( !empty($content['field_drank_faciliteiten']) ) : ?>
        <div class='field-drank-faciliteiten-wrapper mb5'>
          <?php print render($content['field_drank_faciliteiten']); ?>
        </div>
      <?php endif; ?>

      <?php if( !empty($content['field_tijdstip_beschikbaarheid']) ) : ?>
        <div class='field-tijdstip-beschikbaarheid-wrapper mb5'>
          <?php print render($content['field_tijdstip_beschikbaarheid']); ?>
        </div>
      <?php endif; ?>

      <?php if( !empty($content['field_capaciteit']) ) : ?>
        <div class='field-capaciteit-wrapper no-float mb5'>
          <?php print render($content['field_capaciteit']); ?>
        </div>
      <?php endif; ?>

      <?php if( !empty($content['field_oppervlakte']) ) : ?>
        <div class='field-oppervlakte-wrapper mb5'>
          <?php print render($content['field_oppervlakte']); ?>
        </div>
      <?php endif; ?>

      <?php if( !empty($content['field_locatie']) ) : ?>
        <div class='field-locatie-wrapper mb5'>
          <?php print render($content['field_locatie']); ?>
        </div>
      <?php endif; ?>

      <?php if( !empty($content['field_dienst']) ) : ?>
        <div class='field-dienst-wrapper mb5'>
          <?php print render($content['field_dienst']); ?>
        </div>
      <?php endif; ?>

      <?php if( !empty($content['field_verantwoordelijke']) ) : ?>
        <div class='field-verantwoordelijke-wrapper mb5'>
          <?php print render($content['field_verantwoordelijke']); ?>
        </div>
      <?php endif; ?>

      <?php print render($content['body']); ?>

    </div>

  </div>
</article>
