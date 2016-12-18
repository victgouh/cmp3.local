<!--<div id="cnapi-object-<?php print $cdbid; ?>" class="<?php print $classes; ?> mini-teaser clearfix"<?php print $attributes; ?>>
  
  <div class="teaser-text">

    <?php print render($title_prefix); ?>
    <h<?php print $heading_level ?><?php print $title_attributes; ?>>
      <a href="<?php print $object_url; ?>"><?php print $title; ?></a>
    </h<?php print $heading_level ?>>
    <?php print render($title_suffix); ?>
  
    <?php if ($where) : ?>
      <div class="where"><?php print $where ?></div>
    <?php endif; ?>
  
    <?php if ($when) : ?>
      <div class="when"><?php print $when ?></div>
    <?php endif; ?>
    
  </div>

</div>-->
<?php 
$city = variable_get('drk_city', '');
?>
<div class="contextBlock" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-size:13px;line-height:16px;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;padding-top:12px;padding-bottom:6px;padding-right:6px;padding-left:6px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#AA113F;">
  <h4 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;color:#AA113F;font-size:12px;padding-top:0;padding-bottom:4px;padding-right:0;padding-left:0;"><?php print $title; ?></h4>
  <div class="metaInfo" style="margin-top:0;margin-right:0;font-size:13px;line-height:16px;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;margin-bottom:0.5em;background-color:#efefef;margin-left:-0.4em;padding-top:0.25em;padding-bottom:0.25em;padding-right:0;padding-left:0.5em;">
    <!--<p  style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-bottom:0em;font-size:85%;color:#333;">Wie: <em style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-style:normal;color:#000;">Dr. Els De Rijck</em></p>-->
    <p style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-bottom:0em;font-size:85%;color:#333;">Wanneer: <em style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-style:normal;color:#000;"><?php print $when; ?></em></p>
    <p style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-bottom:0em;font-size:85%;color:#333;">Waar: <em style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-style:normal;color:#000;"><?php print $where; ?></em></p>
  </div>
  <p style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-bottom:6px;">Meer info: <a href="<?php print $object_url; ?>" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;color:#036;">www.<?php print strtolower($city); ?>.be</a></p>
</div>
  

