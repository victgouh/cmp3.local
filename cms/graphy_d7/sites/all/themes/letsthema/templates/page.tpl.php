<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>



<!-- start <?php echo basename(__FILE__); ?> -->

<div class="top-bar">
  <div class="top-bar-left">
    <ul class="menu">
      <li class="menu-text"><?php echo variable_get('site_name', "Default site name"); ?></li>
    </ul>
  </div>
  <div class="top-bar-right">
    <?php

    $mainmenu = module_invoke('menu', 'block_view', 'menu-primary-menu');
    print render($mainmenu['content']);

    ?>
  </div>
</div>

<div id="header" class="hero callout large primary" style="background-image: url('img/header.jpg')">
  <div class="row column text-center">
    <h1><?php echo $title; ?></h1>
  </div>
</div>

<?php if($messages) : ?>
<div class="row" id="drupal-messages">
    <?php print $messages; ?>
</div>
<?php endif; ?>

<div class="row" id="content">
  <div class="medium-8 columns">
    <?php print render($page['content']); ?>

    <hr>
    <hr>
    <hr>


    <div class="blog-post">
      <h3>Awesome blog post title
        <small>3/6/2016</small>
      </h3>
      <img class="thumbnail" src="img/850x350.png">
      <p>Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim
        congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci.
        Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum.
        Nulla at nulla justo, eget luctus.</p>
      <div class="callout">
        <ul class="menu simple">
          <li><a href="#">Author: Mike
              Mikers</a></li>
          <li><a href="#">Comments: 3</a></li>
        </ul>
      </div>
    </div>
    <div class="blog-post">
      <h3>Awesome blog post title
        <small>3/6/2016</small>
      </h3>
      <img class="thumbnail" src="img/850x350.png">
      <p>Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim
        congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci.
        Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum.
        Nulla at nulla justo, eget luctus.</p>
      <div class="callout">
        <ul class="menu simple">
          <li><a href="#">Author: Mike
              Mikers</a></li>
          <li><a href="#">Comments: 3</a></li>
        </ul>
      </div>
    </div>
    <div class="blog-post">
      <h3>Awesome blog post title
        <small>3/6/2016</small>
      </h3>
      <img class="thumbnail" src="img/850x350.png">
      <p>Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim
        congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci.
        Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum.
        Nulla at nulla justo, eget luctus.</p>
      <div class="callout">
        <ul class="menu simple">
          <li><a href="#">Author: Mike
              Mikers</a></li>
          <li><a href="#">Comments: 3</a></li>
        </ul>
      </div>
    </div>
    <div class="blog-post">
      <h3>Awesome blog post title
        <small>3/6/2016</small>
      </h3>
      <img class="thumbnail" src="img/850x350.png">
      <p>Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim
        congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci.
        Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum.
        Nulla at nulla justo, eget luctus.</p>
      <div class="callout">
        <ul class="menu simple">
          <li><a href="#">Author: Mike
              Mikers</a></li>
          <li><a href="#">Comments: 3</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="medium-3 columns sticky-container" data-sticky-container="" style="height: 318px;">
    <div class="sticky is-anchored is-at-top" data-sticky="wnvizo-sticky" data-anchor="content"
         data-resize="gzn37n-sticky" style="max-width: 285px; margin-top: 0px; top: 0px; bottom: 1966px;"
         data-events="resize">
      <?php

      $searchform = module_invoke('search', 'block_view', 'form');
      print render($searchform['content']);

      ?>
      <?php print render($page['sidebar']); ?>
    </div>
  </div>
</div>

<!-- end <?php echo basename(__FILE__); ?> -->