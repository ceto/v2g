<?php
/**
 * Template Name: Felezett Template
 *
 * The template for displaying contact page with Map
 *
 * @package Worx
 */

get_header(); ?>



  <div class="main-container">
    <header class="mosaic-header">
      <h1 class="mosaic-title"><?php _e('Contact','v2g'); ?></h1>
      <nav class="nav-portcategory">
      <?php // Primary navigation
        wp_nav_menu( array(
            'theme_location'  => 'contact',
            'container'     => false,
            'fallback_cb'   => 'wp_page_menu',
        ));
      ?>
      </nav>
    </header>
    <div class="center-content">

    <div id="primary" class="content-area">

      <main id="main" class="site-main" role="main">

        <div class="contact__left">
        <?php // WP Query

        while( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="post-content">

              <header class="entry-header">

                <?php // Title

                the_title( '<h1 class="entry-title">', '</h1>' ); ?>

              </header><!-- END .entry-header -->

              <?php // Entry content

              if( $post->post_content != '' ) : ?>

              <div class="entry-content">

                <?php the_content(); ?>

                <?php // Link pages

                wp_link_pages( array(

                  'before' => '<div class="page-links">' . __( 'Pages:', 'ikoniq' ),
                  'after'  => '</div>',

                ) ); ?>

              </div><!-- END .entry-content -->

              <?php endif; ?>

            </div><!-- END .post-content -->

          </article><!-- END #post-<?php the_ID(); ?> -->

        <?php endwhile; ?>
        </div>
        <div class="contact__right">
          <?php the_post_thumbnail(); ?>
        </div>

      </main><!-- END .site-main -->

    </div><!-- END .content-area -->

    </div>

  </div><!-- END .main-container -->

  <?php // Comments

  if( comments_open() || get_comments_number() ) :

    comments_template( '', true );

  endif; ?>

<?php // Footer

get_footer(); ?>

