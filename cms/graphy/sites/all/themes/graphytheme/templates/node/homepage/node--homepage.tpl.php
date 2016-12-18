<?php if( theme_get_setting('themer_helper') ) : ?>
  <!--<?php print __FILE__; ?>-->
<?php endif; ?>

<?php dsm($content)?>

<div<?php print $attributes; ?>>
  <?php /*print render($content["field_intro_image"]); */?>

  <!-- Banner -->
  <section id="banner">
    <div class="inner">
      <h1>  <?php print render($content["field_intro_text"]); ?></h1>
      <ul class="actions">
        <li><a href="#" class="button alt"><?php print render($content["field_intro_button"]); ?></a></li>
      </ul>
    </div>
  </section>

  <!-- introtext -->
  <section id="intro">
    <div class="inner">


      <header>
        <h2><?php print render($content["field_welkom_titel"]); ?></h2>
      </header>
      <p><?php print render($content["field_welkom_text"]); ?></p>
      <ul class="actions">
        <li><a href="#" class="button alt"><?php print render($content["field_welkom_button"]); ?></a></li>
      </ul>
    </div>
  </section>


  <!-- Aanbiedingen -->
  <section id="aanbiedingen">
    <div class="inner">
      <article>
        <div class="content">

          <header>
            <h3><?php print render($content["field_aanbieding1_titel"]); ?></h3>
          </header>
          <p><?php print render($content["field_aanbieding1_text"]); ?></p>
          <ul class="actions">
            <li><a href="#" class="button alt"><?php print render($content["field_aanbieding1_button"]); ?></a></li>
          </ul>
        </div>
      </article>
      <article>
        <div class="content">
          <header>
            <h3><?php print render($content["field_aanbieding2_titel"]);?></h3>
          </header>
          <p><?php print render($content["field_aanbieding2_text"]); ?></p>
          <ul class="actions">
            <li><a href="#" class="button alt"><?php print render($content["field_aanbieding2_button"]); ?></a></li>
          </ul>
        </div>
      </article>
      <article>
        <div class="content">

          <header>
            <h3><?php print render($content["field_aanbieding3_titel"]); ?></h3>
          </header>
          <p><?php print render($content["field_aanbieding3_text"]); ?></p>
          <ul class="actions">
            <li><a href="#" class="button alt"><?php print render($content["field_aanbieding3_button"]); ?></a></li>
          </ul>
        </div>
      </article>
    </div>
  </section>

</div>
