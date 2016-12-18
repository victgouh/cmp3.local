<?php
  $hasSidebar = (!empty($page['sidebar_first']) || !empty($page['sidebar_first_middle']) || !empty($page['sidebar_first_bottom']) || !empty($page['sidebar_second']) || !empty($page['sidebar_second_middle']) || !empty($page['sidebar_second_bottom']))? true : false;
?>
<?php if (!empty($node) && $node->status == 0): ?>
  <div class="nodeunpublished messages messages--status">
    <a href="#" class="close"><i class="fa fa-times"></i></a>
    <ul>
      <li><i class="fa fa-info-circle"></i><?php print t('Deze node is niet gepubliceerd.'); ?> <a href="<?php print url("node/$node->nid/edit"); ?>"><?php print t('Publiceer deze node.'); ?></a></li>
    </ul>
  </div>
<?php endif ?>

<?php if (!empty($tabs['#primary'])): ?>
  <?php if (user_is_logged_in()): ?>
    <a href="#" class="open-tabs"><i class="fa fa-cog"></i></a>
    <div class="tabs-container hidden">
      <a href="#" class="close-tabs"><i class="fa fa-close"></i></a>
      <?php print render($tabs); ?>
    </div>
  <?php endif ?>
<?php endif; ?>

<div class="hidden stretch mobile"></div>
<?php print render($page['mobile_navigation']); ?>

<div id="main">
  <header class="centered container">

      <div class="secondairy-and-account">
          <?php print render($page['top_navigation']); ?>
      </div>

    <div class="logo-and-nav <?php echo (!$page['secondary_navigation'])? "no-hover": ""; ?>">

      <?php if ($logo): ?>
        <div class="entity">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">

             <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" data-svg="<?php print str_replace("png", "svg", $logo); ?>">

          </a>
        </div>
      <?php endif; ?>




      <?php print render($page['main_navigation']); ?>

      <div class="mobile-nav-wrapper latest">
        <a href="#" class="hamburger"><?php print t("menu"); ?><i></i></a>
      </div>

    </div>
  </header>

  <?php print render($page['secondary_navigation']); ?>

  <div class="separator"></div>

  <?php if ($breadcrumb && $show_breadcrumb): ?>
    <div class="centered container">
      <div id="breadcrumb">
        <?php print $breadcrumb; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php print $messages; ?>

  <?php print render($page['help']); ?>

  <div class="content-wrapper<?php print (!isset($node) || $hasSidebar) ? " centered": ""; ?>">

    <?php if ($hasSidebar): ?>
      <aside class="side-bar side-bar-right">
        <?php if (!empty($page['sidebar_first'])): ?>
          <?php print render($page['sidebar_first']); ?>
        <?php endif ?>

        <?php if (!empty($page['sidebar_first_middle'])): ?>
          <?php print render($page['sidebar_first_middle']); ?>
        <?php endif ?>

        <?php if (!empty($page['sidebar_first_bottom'])): ?>
          <?php print render($page['sidebar_first_bottom']); ?>
        <?php endif ?>

        <?php if (!empty($page['sidebar_second'])): ?>
          <?php print render($page['sidebar_second']); ?>
        <?php endif ?>

        <?php if (!empty($page['sidebar_second_middle'])): ?>
          <?php print render($page['sidebar_second_middle']); ?>
        <?php endif ?>

        <?php if (!empty($page['sidebar_second_bottom'])): ?>
          <?php print render($page['sidebar_second_bottom']); ?>
        <?php endif ?>
      </aside>
    <?php endif; ?>

    <div id="mid">
      <?php if ($title && $show_main_title): ?>
        <div class="<?php print isset($node) ? "centered": ""; ?>">
          <?php print render($title_prefix); ?>
            <h1 class="title" id="page-title">
              <?php print $title; ?>
            </h1>
          <?php print render($title_suffix); ?>
        </div>
      <?php endif; ?>

      <?php if (! user_is_logged_in()): ?>
        <?php print render($tabs); ?>
      <?php endif ?>

      <?php print render($page['top']); ?>
      <?php print render($page['content']); ?>
      <?php print render($page['content_bottom']); ?>
    </div>
  </div>
  <!--googleoff: all-->
  <footer class="centered robots-nocontent nocontent">
    <?php print render($page['footer']); ?>
  </footer>
  <!--googleon: all-->
</div>
