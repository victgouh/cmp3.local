<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<div class="contentBlock" id="item0"
     style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-size:13px;line-height:16px;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;padding-top:12px;padding-bottom:12px;padding-right:0;padding-left:0;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#AA113F;clear:both;">
  <h2
    style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;color:#AA113F;font-size:16px;padding-top:12px;padding-bottom:12px;padding-right:0;padding-left:0;"><?php print $fields['title']->content; ?></h2>
  <?php if (strpos($fields['field_lijstafbeelding']->content, "img") !== FALSE) : ?>
    <div class="image"
         style="font-size:13px;line-height:16px;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;float:left;width:100px;margin-top:0;margin-bottom:6px;margin-right:12px;margin-left:0;background-color:#fff;padding-top:6px;padding-bottom:6px;padding-right:6px;padding-left:6px;border-width:1px;border-style:solid;border-color:#ccc;"><?php print $fields['field_lijstafbeelding']->content; ?></div><?php endif; ?>
  <div><?php print $fields['body']->content; ?></div>
  <p class="more"
     style="margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-bottom:6px;text-align:right;"><?php print $fields['view_node']->content; ?>
    <a href="<?php print $fields['path']->content; ?>"
       style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;color:#036;">Meer</a>
  </p>

  <div class="clear"
       style="margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'trebuchet MS', 'Lucida Sans', Arial, Verdana, Helvetica, sans-serif;text-align:left;vertical-align:top;clear:both;height:0;line-height:0;visibility:hidden;font-size:0px;">
    &nbsp;</div>
</div>