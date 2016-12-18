<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php
  hide($content['comments']);
  hide($content['links']);
?>

<article<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?> itemscope itemtype="http://schema.org/Organization">
    <?php if (!empty($title)): ?>
      <h1 itemprop="name"><?php print $title; ?></h1>
    <?php endif; ?>

    <div class="container clearfix">
      <div class="w6">
        <?php if (!empty($company_logo)): ?>
          <div class="company-logo">
            <?php print $company_logo; ?>
          </div>
        <?php endif; ?>

        <div class="adress<?php !empty($company_logo) ? print ' has-logo': ''; ?> mb20 pt10" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
          <div class="adres-line-two">
            <?php if (!empty($company_address)): ?>
              <span itemprop="streetAddress"><?php print $company_address; ?></span>
            <?php endif; ?>
          </div>

          <div class="adres-line-two">
            <?php if (!empty($company_city)): ?>
              <?php print $company_city; ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="company-contact mb20">
          <?php if (!empty($company_contact_email)): ?>
            <div class="contact-email">
              <?php print $company_contact_email; ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($company_contact_website)): ?>
            <div class="contact-website">
               <?php print $company_contact_website; ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($company_contact_phone)): ?>
            <div class="contact-phone"><?php print $company_contact_phone; ?></div>
          <?php endif;?>

          <?php if (!empty($company_contact_mobile)): ?>
            <div class="contact-phone"><?php print $company_contact_mobile; ?></div>
          <?php endif;?>

          <?php if (!empty($company_contact_fax)): ?>
            <div class="contact-fax"><?php print $company_contact_fax; ?></div>
          <?php endif;?>

        </div>

        <?php if (!empty($company_social)): ?>
          <div class="company-social">
            <ul>
              <?php foreach ($company_social as $social_link): ?>
                <li><?php print $social_link; ?></li>
            <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>


        <div class="print">
          <a href="#" onclick="window.print();return false;"><?php print t("Print fiche"); ?></a>
        </div>

        <?php if (!empty($company_description)): ?>
        <div class="company-body">
          <?php print $company_description; ?>
        </div>
        <?php endif; ?>


        <?php if (!empty($company_hours) && $company_hours['available']): ?>
          <div id="company-hours">
            <h3><?php print t("Openingsuren: "); ?></h3>
            <?php if ($company_hours['type'] == 'schematisch'): ?>
              <?php foreach ($company_hours['days'] as $day_output): ?>
                <?php print $day_output; ?>
              <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($company_hours['free_text'])): ?>
              <div class="free-text-hours">
                <?php print $company_hours['free_text']; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($node->activities): ?>
          <div class="activities mt10<?php if (! empty($node->field_company_image)) { print ' has-logo'; }?>">
            <h3><?php print t("Categoriën: "); ?></h3>
            <ul class="clean">
              <?php foreach ($node->activities as $activity): ?>
                <li class="m5"><?php print $activity; ?></li>
              <?php endforeach; ?>
            </ul>

            <?php if (!empty($node->field_company_activity_text['und'][0]['safe_value'])): ?>
              <div class="m5"><?php print $node->field_company_activity_text['und'][0]['safe_value']; ?></div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="w6 latest">
        <?php if (!empty($cover_picture)): ?>
          <div class="company_cover">
            <?php print $cover_picture; ?>
          </div>
        <?php endif; ?>

        <?php if (!empty ($company_photos)): ?>
          <div class="company_fotos">
            <?php foreach($company_photos as $image): ?>
              <?php print $image; ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <div class="company-map">
          <?php print companyguide_load_map_settings($node); ?>
          <?php if (isset($node->gmap)): ?>
            <?php print $node->gmap; ?>
          <?php endif; ?>

          <?php if( !empty($company_map_routing)): ?>
            <div class="m5 ta-right">
              <?php print $company_map_routing; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</article>
