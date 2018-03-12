<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: Gabor Szabó <szabogabi@gmail.com>
*/ ?>

<?php if (have_posts()):?>
<aside class="center-content wide relatedprojects">
  <header class="entry-header">
    <h3 class="entry-title">Hasonló munkák</h3>
  </header>
  <div id="relatedprojects" class="portfolio-area">
    <div class="site-portfolio portfolio-section masonry-grid grid-loading hover-overlay columns-multi">
      <div class="column-width"></div>
      <div class="gutter-width"></div>
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part( 'partials/content', 'portfolio' ); ?>
      <?php endwhile; ?>
    </div><!-- END .portfolio-section -->
  </div><!-- END .portfolio-area -->
</aside>
<?php endif; ?>