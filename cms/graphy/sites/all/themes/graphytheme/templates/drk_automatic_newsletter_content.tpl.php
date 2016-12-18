<?php

/**
 * @file
 * Default theme implementation to format the simplenews newsletter body.
 *
 * Copy this file in your theme directory to create a custom themed body.
 * Rename it to override it. Available templates:
 *   simplenews-newsletter-body--[tid].tpl.php
 *   simplenews-newsletter-body--[view mode].tpl.php
 *   simplenews-newsletter-body--[tid]--[view mode].tpl.php
 * See README.txt for more details.
 *
 * Available variables:
 * - $build: Array as expected by render()
 * - $build['#node']: The $node object
 * - $title: Node title
 * - $language: Language code
 * - $view_mode: Active view mode
 * - $simplenews_theme: Contains the path to the configured mail theme.
 * - $simplenews_subscriber: The subscriber for which the newsletter is built.
 *   Note that depending on the used caching strategy, the generated body might
 *   be used for multiple subscribers. If you created personalized newsletters
 *   and can't use tokens for that, make sure to disable caching or write a
 *   custom caching strategy implemention.
 *
 * @see template_preprocess_simplenews_newsletter_body()
 */

$city = variable_get('drk_city', '');
$logo_url = "http://www.".strtolower($city).".be/sites/all/themes/sites/leiedal_base/drk_".strtolower(str_replace("-","",$city))."/logo.png";
$gemeente_naam = ucfirst($city);
$date_formatted = date("d-m-Y", time());
$cnapi_url = "http://www.uitin$city.be";
$current_year = date('Y', time());
$this_newsletter_url = "http://www.".strtolower($city).".be/newsletters/latest";
$unsubscribe_url = "http://www.".strtolower($city).".be/newsletters/unsubscribe/" . md5(time());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title><?php print $title; ?></title>
</head>
<body style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
<style type="text/css">
  <!--
  body{background-color:#FFFFFF;}
  div, table, td {font-size:13px;line-height:16px;font-family: "trebuchet MS", "Lucida Sans", Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;}
  * {margin:0; padding:0;}

  div.bodyImposter {background:#fff;text-align:center;}
  table.masterTable {width:640px;margin:0 auto 24px;border:0;}

  a {color:#036;}
  a:hover {color:#AA113F;text-decoration:none;}

  p, ul {margin-bottom:6px;}
  p.more {text-align:right;}

  ul {margin-left:16px;margin-top:-4px;}

  h1 {color:#AA113F;font-size:18px;padding:12px 0 12px;}
  h2 {color:#AA113F;font-size:16px;padding:12px 0 12px;}
  h3 {color:#AA113F;font-size:14px;padding:12px 6px 0;}
  h4 {color:#AA113F;font-size:12px;padding:0 0 4px;}

  div.clear {clear:both;height:0;line-height:0;visibility:hidden;font-size:0px;}

  td.header {padding:12px 0 0;border-bottom:2px solid #AA113F;}
  td.header a span.siteLabelLogo{display:block;}
  td.header a span.siteLabelText{display:block;font-size:30px;font-weight:bold;color:#AA113F;margin-bottom:10px;text-decoration:none;}

  td.content {padding:24px 18px 24px 0;}
  td.content div.contentBlock {padding:12px 0 12px;border-bottom:1px solid #AA113F;clear:both;}
  div.tableOfContents {padding:12px 12px 6px;border:1px solid #BFCCD9;margin-bottom:12px}
  div.tableOfContents h2 {color:#036;padding-top:0;}

  div.image {float:left;width:75px;margin:0 12px 6px 0;background:#fff;padding:6px;border:1px solid #ccc;}
  div.image img {display:block;width:75px;}

  img.asset-align-left { padding-right:5px; }

  td.context {width:200px;border-left:1px solid #036;}
  td.context div.contextBlock {padding:12px 6px 6px;border-bottom:1px solid #AA113F;}
  td.context div.contextBlock div.metaInfo {margin-bottom:0.5em;background:#efefef;margin-left:-0.4em;padding:0.25em 0 0.25em 0.5em;}
  td.context div.contextBlock div.metaInfo p {margin-bottom:0em;font-size:85%;color:#333;}
  td.context div.contextBlock div.metaInfo p em {font-style:normal;color:#000;}

  td.footer {font-size:11px;border-top:2px solid #AA113F;padding-top:6px;}
  td.context div.last {border-bottom-color:#fff;}
  td.content div.last {border-bottom-color:#fff;}

  -->
</style>
<div class="bodyImposter"  style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-size:13px;line-height:16px;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;vertical-align:top;background-color:#fff;text-align:center;">
  <table cellpadding="0" cellspacing="0" border="0" class="masterTable" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-size:13px;line-height:16px;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;width:640px;margin-top:0;margin-bottom:24px;margin-right:auto;margin-left:auto;border-width:0;">
    <tr style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">

      <td colspan="2" class="header"  style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-size:13px;line-height:16px;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;padding-top:12px;padding-bottom:0;padding-right:0;padding-left:0;border-bottom-width:2px;border-bottom-style:solid;border-bottom-color:#AA113F;">
        <a href="http://www.<?php print strtolower($gemeente_naam) ?>.be" title="Naar de website van Gemeente <?php print $gemeente_naam ?>" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;color:#036;">
          <!-- Gebruik logo -->
          <span class="siteLabelLogo" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;display:block;" ><img style="margin-top:0;margin-bottom:10px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;"  src="<?php print $logo_url ; ?>" alt="logo - link naar de website van Gemeente <?php print $gemeente_naam; ?>" border="0" /></span>
        </a>
      </td>

    </tr>
    <tr style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
      <td class="content" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-size:13px;line-height:16px;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;padding-top:24px;padding-bottom:24px;padding-right:0px;padding-left:0;width:640px">
        <h1 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;color:#AA113F;font-size:18px;padding-top:12px;padding-bottom:12px;padding-right:0;padding-left:0;"><?php print $title ?></h1>
        <h2 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;color:#AA113F;font-size:14px;padding-top:0;padding-bottom:12px;padding-right:0;padding-left:0;"><?php print $date_formatted ?></h2>
        <div></div>


        <div class="tableOfContents" style="margin-top:0;margin-right:0;margin-left:0;font-size:13px;line-height:16px;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;padding-top:12px;padding-bottom:6px;padding-right:12px;padding-left:12px;border-width:1px;border-style:solid;border-color:#BFCCD9;margin-bottom:12px;">
          <h2 style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-size:16px;padding-bottom:12px;padding-right:0;padding-left:0;color:#036;padding-top:0;">In deze nieuwsbrief:</h2>

          <?php print $variables['news_summary']; ?>



        </div>


        <?php print $variables['news_list']; ?>


      </td>
    </tr>
    <tr style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
      <td colspan="2" class="footer" style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-bottom:0;padding-right:0;padding-left:0;line-height:16px;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;font-size:11px;border-top-width:2px;border-top-style:solid;border-top-color:#AA113F;padding-top:6px;">
        <p style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-bottom:6px;"><?php print $current_year ?> - <a style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;color:#036;" href="http://www.<?php print strtolower($gemeente_naam) ?>.be">Gemeente <?php print $gemeente_naam; ?></a></p>
        <p style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;color:#036;">Ondervind je technische moeilijkheden bij het lezen van deze nieuwsbrief? <a style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;color:#036;" href="<? print $this_newsletter_url; ?>">Klik dan hier voor een online versie</a>.
        <p style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-bottom:6px;">Je gegevens worden uitsluitend aangewend voor de communicatie over gemeente-initiatieven en zullen noch uitgeleend, noch verhuurd, noch verkocht worden aan derden. Overname van berichten uit deze nieuwsbrief voor niet-commerci&euml;le doeleinden is toegelaten mits bronvermelding. Wens je je uit te schrijven, <a href="<?php print $unsubscribe_url; ?>">klik hier</a>.</p>

      </td>
    </tr>
  </table>
</div>
</body>
</html>
