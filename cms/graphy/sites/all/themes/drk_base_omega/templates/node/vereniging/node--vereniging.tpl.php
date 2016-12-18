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
    <div class="contact-and-map container mb20">
      <div class="contact">
        <div class="contact-wrapper">
          <div class="clearfix global-info mb20">

            <?php if(!empty($content["field_lijstafbeelding"])): ?>
              <div class="w12">
                <?php print render($content["field_lijstafbeelding"]); ?>
              </div>
            <?php endif; ?>

            <div class="w12">
              <div class="m5">
                <?php print render($content["address_street"]); ?>
                <?php print render($content["address_zip"]); ?>
                <?php print render($content["address_city"]); ?>
              </div>
              <div class="m5">
                <?php if(!empty($content["field_telefoon"][0]['#markup'])){ print render($content["field_telefoon"]); } ?>
                <?php if(!empty($content["field_gsm"][0]['#markup'])){ print render($content["field_gsm"]); } ?>
                <?php if(!empty($content["field_fax"][0]['#markup'])){ print render($content["field_fax"]); } ?>
                <?php if(!empty($content["field_e_mailadres"][0]['#markup'])){ print render($content["field_e_mailadres"]); } ?>
                <?php print render($content["field_url"]); ?>
              </div>

              <div class="m5">
                <?php print render($content["opening_hours_comment"]); ?>
                <?php print render($content["openinghours_status_now"]); ?>
                <?php print render($content["opening_hours_status_today"]); ?>
              </div>
            </div>

            <div class="w12">
              <?php if(!empty($content["body"])){
                  print render($content["body"]); } ?>
              <?php if(!empty($content["field_toegankelijkheid"][0]['#markup'])){ print render($content["field_toegankelijkheid"]); } ?>
              <?php if(!empty($content["field_wegbeschrijving"][0]['#markup'])){ print render($content["field_wegbeschrijving"]); } ?>
              <?php if(!empty($content["field_extra_informatie"][0]['#markup'])){ print render($content["field_extra_informatie"]); } ?>  
              <?php if(!empty($content["field_openingsuren"][0]['#markup'])){ print render($content["field_openingsuren"]); } ?>              
            </div>
          </div>
        </div>
      </div>

      <div class="map-info latest">
        <?php print render($content["address_gmap"]); ?>
      </div>
    </div>

    <?php if(!empty($content["opening_hours_closing_hours"])
      || !empty($content["opening_hours_exception"])): ?>

      <div class="container adress-exceptions mb20">
        <?php print render($content["opening_hours_exception"]); ?>
        <?php print render($content["opening_hours_closing_hours"]); ?>
      </div>

    <?php endif; ?>

    <div class="container">
      <?php print render($content["field_item_onder_inhoud"]); ?>
    </div>

    <div class="container">
      <?php print render($content["field_adres"]); ?>
    </div>

    <div class="container">
      <?php print render($content["field_fotoalbum"]); ?>
    </div>

  </div>
</article>
