<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php
  // Hide items from content.
  hide($content['comments']);
  hide($content['links']);
  hide($content['field_spotlights']);
  // hide($content['field_news']);
?>

<article<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>

    <?php if( !empty($content["field_service_first"]) || !empty($content["field_service_second"]) || !empty($content["field_service_other"])) : ?>
      <div id="services-highlighted" class="centered">
        <div class="container mb20">
          <?php print render($content["field_service_first"]); ?>
          <?php print render($content["field_service_second"]); ?>
        </div>

        <?php if( !empty($content["field_service_other"]) ) : ?>
          <div class="container">
            <?php print render($content["field_service_other"]); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if( !empty($content["body"]) ) : ?>
    <div id="body-content" class="centered container" >
      <?php print render($content['body']);?>
    </div>
    <?php endif; ?>

    <?php if( !empty($content["field_spotlights"]) ) : ?>
    <div id="services-spotlights" class="container centered">
      <?php print render($content["field_spotlights"]); ?>
    </div>
    <?php endif; ?>

    <?php if( !empty($content["field_news"]) ) : ?>
      <?php if( !empty($content["field_news_title"]) ) : ?>
        <div class="centered carrousel-title">
          <?php print render($content["field_news_title"]); ?>
        </div>
      <?php endif; ?>

      <div id="services-news">
        <?php print render($content["field_news"]); ?>
      </div>
    <?php endif; ?>

    <?php if( !empty($content["field_block"]) ) : ?>
      <?php if( !empty($content["field_block_title"]) ) : ?>
        <div class="centered carrousel-title">
          <?php print render($content["field_block_title"]); ?>
        </div>
      <?php endif; ?>

      <div id="agenda" class="container centered">
        <?php print render($content["field_block"]); ?>
      </div>

      <?php if( !empty($content["field_block_url"]) ) : ?>
        <div class="centered carrousel-url">
          <?php print render($content["field_block_url"]); ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <?php if( !empty($content["field_contact"]) ) : ?>
    <div id="contact" class="container centered">
      <?php print render($content["field_contact"]); ?>
    </div>
    <?php endif; ?>

  </div>
</article>
