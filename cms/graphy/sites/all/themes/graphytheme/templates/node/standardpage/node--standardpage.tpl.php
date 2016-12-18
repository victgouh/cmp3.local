<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<div<?php print $attributes; ?>>

  <!-- content -->
  <section id="intro">
    <div class="inner">


      <header>
        <h2><?php print render($content["field_standardpage_title"]); ?></h2>
      </header>
      <p><?php print render($content["field_standardpage_text"]); ?></p>

    </div>
  </section>




</div>
