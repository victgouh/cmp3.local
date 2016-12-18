<?php

$entity = $row->getEntity();
$detail = $entity->getDetails()->current();
$location = $entity->getLocation();
$address = $location->getAddress();
$physicalAddress = $address->getPhysicalAddress();

$title = $detail->getTitle();
$calendarSummary = $detail->getCalendarSummary();
$locationLabel = $location->getLabel();
$addressCity = $physicalAddress->getCity();
$url = '/agenda/e/' . culturefeed_search_slug($detail->getTitle()) . '/' . $entity->getCdbId();

?>
<div class="contextBlock" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-size:13px;line-height:16px;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;padding-top:12px;padding-bottom:6px;padding-right:6px;padding-left:6px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#AA113F;">
  <h4 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;color:#AA113F;font-size:12px;padding-top:0;padding-bottom:4px;padding-right:0;padding-left:0;"><?php print $title; ?></h4>
  <div class="metaInfo" style="margin-top:0;margin-right:0;font-size:13px;line-height:16px;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;margin-bottom:0.5em;background-color:#efefef;margin-left:-0.4em;padding-top:0.25em;padding-bottom:0.25em;padding-right:0;padding-left:0.5em;">
    <p style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-bottom:0em;font-size:85%;color:#333;">Wanneer: <em style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-style:normal;color:#000;"><?php print $calendarSummary; ?></em></p>
    <p style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-bottom:0em;font-size:85%;color:#333;">Waar: <em style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-style:normal;color:#000;"><?php print $locationLabel; ?>, <?php print $addressCity; ?></em></p>
  </div>
  <p style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-bottom:6px;">Meer info: <a href="<?php print $url ?>" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;color:#036;">www.<?php print strtolower($addressCity); ?>.be</a></p>
</div>
