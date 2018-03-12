<?php
/**
 * Template Name: Projects Template
 *
 * The template for displaying projects
 *
 * @package Worx
 */

get_header();

if( ! class_exists( 'TVA_Portfolio_Post_Type' ) ) {

	return;

} ?>

	<div class="main-container">

		<?php get_template_part('header','mosaic' ); ?>

		<?php // Portfolio

		// Pagination
		if( get_query_var( 'paged' ) ) {

			$paged = get_query_var( 'paged' );

		} elseif( get_query_var( 'page' ) ) {

			$paged = get_query_var( 'page' );

		} else {

			$paged = 1;

		}

		// Posts Per Page
		$posts_per_page = get_theme_mod( 'portfolio_posts_per_page', 10 );

		// Args
		$args = array(

			'post_type'				=> 'portfolio_project',
			'posts_per_page'		=> esc_attr( $posts_per_page ),
			'offset'				=> 0,
			'paged'					=> $paged,
			'post_status'			=> 'publish',
			'orderby'				=> 'date',
			//'order'					=> 'DESC',

		);

		$wp_query = new WP_Query( $args );

		if( $wp_query->have_posts() ) : ?>

		<div class="center-content wide">

		<div id="portfolio" class="portfolio-area">

			<div class="site-portfolio portfolio-section masonry-grid grid-loading hover-overlay columns-multi">

				<div class="column-width"></div><div class="gutter-width"></div>

				<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

				<?php get_template_part( 'partials/content', 'portfolio' ); ?>

				<?php endwhile; ?>

			</div><!-- END .site-portfolio -->

		</div><!-- END .portfolio-area -->

		</div>

		<?php endif; ?>

	</div><!-- END .main-container -->

	<?php // Previous/next page navigation.

	worx_posts_navigation(); ?>

	<?php wp_reset_query(); ?>

<?php // Footer

get_footer(); ?>