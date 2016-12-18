<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php
  hide($content['comments']);
  hide($content['links']);
?>

<article<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <div class="companyguide-teaser clearfix">
      <h3 class="companyguide-teaser-header">
        <a href="<?php print $node_url ?>">
          <?php print $node->title; ?>
        </a>
      </h3>

      <div class="companyguide-result-buttons mb5">
        <?php if (isset($node->field_company_email['und'][0]['value']) && !empty($node->field_company_email['und'][0]['value'])): ?>
          <a href="<?php print $link ?>" title="<?php print $node->field_company_email['und'][0]['value']; ?>"><i class="fa fa-envelope"></i></a>
        <?php endif; ?>

        <?php if (isset($node->field_company_website['und'][0]['value']) && !empty($node->field_company_website['und'][0]['value'])): ?>
          <a style="margin: 0 3px;"href="<?php print (substr($node->field_company_website['und'][0]['value'],0,7)=='http://' ? $node->field_company_website['und'][0]['value'] : 'http://'.$node->field_company_website['und'][0]['value']) ?>" title="<?php print $node->field_company_website['und'][0]['value'] ?>"><i class="fa fa-globe"></i></a>
        <?php endif; ?>

        <?php if (isset($node->field_company_phone['und'][0]['value']) && !empty($node->field_company_phone['und'][0]['value'])): ?>
          <a href="<?php print $link ?>" title="<?php print $node->field_company_phone['und'][0]['value']; ?>"><i class="fa fa-phone"></i></a>
        <?php endif; ?>
      </div>

      <p>
        <?php print $node->field_company_street['und'][0]['value']; ?> <?php print $node->field_company_streetnr['und'][0]['value'] ?> <?php print (!empty($node->field_company_busnr['und'][0]['value'])?' '.t('Bus').' '.$node->field_company_busnr['und'][0]['value']:'') ?>
        <br/><?php print $node->field_company_postcode['und'][0]['value'] ?> <?php print $node->field_company_subcity['und'][0]['value'] ?>
      </p>
    </div>

    <?php if (isset($has_logo) && $has_logo): ?>
    <div class="companyguide-teaser-logo">
      <?php
          $image = $node->field_company_image['und'][0];
          $image_style = array(
            'style_name' => 'company_logo',
            'path' => $image['uri'],
            'width' => '',
            'height' => '',
            'alt' => $image['alt'],
            'title' => $image['title'],
            );
          print theme('image_style',$image_style);

      ?>
    </div>
    <?php endif; ?>

  </div>
</article>
