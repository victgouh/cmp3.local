  <?php if( theme_get_setting('themer_helper') ) : ?>
    <!--<?php print __FILE__; ?>-->
  <?php endif; ?>

  <div class="<?php print $gemeentelijk_adres_contact_class; ?>">

    <?php if(!empty($header)): ?>
    <h2><?php print $header; ?></h2>
    <?php endif; ?>

    <div class="container">
      <div class="contact">
        <div class="contact-wrapper">
          <div class="container">
            <h2 class="title">
              <a href="<?php print $node_url; ?>">
                <?php print $title; ?>
              </a>
            </h2>
          </div>

          <?php if (empty($content["opening_hours_comment"]) && empty($content["opening_hours_status_now"]) && empty($content["opening_hours_status_today"])): ?>
            <div class="container">
              <div class="m5">
                <?php print render($content["address_street"]); ?>
                <?php print render($content["address_zip"]); ?>
                <?php print render($content["address_city"]); ?>
              </div>

              <div class="m5">
                <?php print render($content["field_telefoon"]); ?>
              </div>

              <?php print render($content["field_e_mailadres"]); ?>
              <?php print render($content["field_url"]); ?>
            </div>

          <?php else: ?>

            <div class="container">
              <div class="w6">
                <div class="m5">
                  <?php print render($content["address_street"]); ?>
                  <?php print render($content["address_zip"]); ?>
                  <?php print render($content["address_city"]); ?>
                </div>

                <div class="m5">
                  <?php print render($content["field_telefoon"]); ?>
                </div>

                <?php print render($content["field_e_mailadres"]); ?>
                <?php print render($content["field_url"]); ?>
              </div>

              <div class="w6 latest">
                <?php print render($content["opening_hours_comment"]); ?>
                <?php print render($content["opening_hours_status_now"]); ?>
                <?php print render($content["opening_hours_status_today"]); ?>
              </div>
            </div>
          <?php endif ?>

          <?php print l(t('Show all'), 'node/' . $nid,  array('attributes' => array('class' => array('link', 'pull-bottom')))); ?>
        </div>
      </div>

      <div class="map-info">
        <?php print render($content["address_gmap"]); ?>
      </div>
    </div>
  </div>
