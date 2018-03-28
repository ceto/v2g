<?php
/**
 * The default template for displaying search content.
 *
 * @package Worx
 */

get_header(); ?>
	<header class="mosaic-header">
		<?php if ( have_posts() ) : ?>
			<h1 class="mosaic-title"><?php printf( __( 'Search Results for: %s', 'v2g' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="mosaic-title"><?php _e( 'Nothing Found', 'v2g' ); ?></h1>
		<?php endif; ?>
		<?php get_template_part('thesearchpanel'); ?>
	</header><!-- .page-header -->
	<div class="main-container">

		<div class="center-content">

		<div id="primary" class="content-area">


			<main id="main" class="site-main" role="main">


			<?php if( have_posts() ) : ?>

				<?php // WP Query

				while( have_posts() ) : the_post(); ?>

					<?php // Format

					get_template_part( 'partials/content', 'search' ); ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'partials/content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- END .site-main -->

		</div><!-- END .content-area -->

		</div>

	</div><!-- END .main-container -->

	<?php // Previous/next page navigation.

	worx_posts_navigation(); ?>

<?php // Footer

get_footer(); ?>