<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<div class="contact-wrapper">
  <div class="container">
    <h2 class="title">
      <a href="<?php print $node_url; ?>">
        <?php print $title; ?>
      </a>
    </h2>
  </div>

  <div class="container container-mid">
    <div class="w6">
      <div class="m5">
        <?php print render($content["address_street"]); ?>
        <?php print render($content["address_zip"]); ?>
        <?php print render($content["address_city"]); ?>
      </div>

      <div class="m5">
        <?php print render($content["field_telefoon"]); ?>
        <?php print render($content["field_fax"]); ?>
      </div>

      <?php print render($content["field_e_mailadres"]); ?>
      <?php print render($content["field_url"]); ?>
      <?php print render($content["field_toegankelijkheid"]); ?>
    </div>

    <div class="w6 latest">
      <div class="m5"><?php print t('Vandaag'); ?></div>
      <?php print render($content["opening_hours_comment"]); ?>
      <?php print render($content["opening_hours_status_now"]); ?>
      <?php print render($content["opening_hours_status_today"]); ?>
    </div>
  </div>

  <?php print l(t('Show all'), 'node/' . $nid,  array('attributes' => array('class' => array('link', 'pull-bottom')))); ?>
</div>
