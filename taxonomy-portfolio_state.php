<?php
/**
 * The template for displaying project category archives
 *
 * @package Worx
 */

get_header(); ?>

	<div class="main-container">

		<?php get_template_part('header','mosaic' ); ?>

		<div class="center-content wide">

		<div id="portfolio" class="portfolio-area">

			<div class="site-portfolio portfolio-section masonry-grid grid-loading hover-overlay columns-multi">

				<div class="column-width"></div><div class="gutter-width"></div>

				<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

				<?php get_template_part( 'partials/content', 'portfolio' ); ?>

				<?php endwhile; ?>

			</div><!-- END .portfolio-section -->

		</div><!-- END .portfolio-area -->

		</div>

	</div><!-- END .main-container -->

	<?php // Previous/next page navigation.

	worx_posts_navigation(); ?>

	<?php wp_reset_query(); ?>

<?php // Footer

get_footer(); ?>