<?php
/**
 * Template Name: Homepage with Slider
 *
 * The template for displaying homepage/portfolio content
 *
 * @package Worx
 */


get_header(); ?>

	<div class="main-container">

		<div class="center-content">

		<div id="primary" class="content-area">

			<main id="main" class="site-main" role="main">

				<?php // WP Query

				while( have_posts() ) : the_post(); ?>


					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php // Content

					if( class_exists( 'ACF' ) ) :

					if( have_rows( 'project_media' ) ) :

					    while( have_rows( 'project_media' ) ) : the_row();

					        if( get_row_layout() == 'project_gallery' ) : ?>

								<?php // Gallery

								// Variables
								$images = get_sub_field( 'gallery' );
								$ids = get_sub_field( 'gallery', false, false );
								$type = get_sub_field( 'gallery_type' );

								// Function
								if( $type == 'stacked' ) {

									worx_gallery( $post, $images, $ids );

								} else {

									worx_carousel( $post, $images );

								} ?>

							<?php elseif( get_row_layout() == 'project_video' ) : ?>

								<?php // Video

								$type = get_sub_field( 'video_type' );

								if( $type == 'embed' ) {

									$embed = get_sub_field( 'video_embed' );

									worx_embed( $post, $embed );

								} else {

									$url = get_sub_field( 'video_url' );

									worx_video( $post, $url, $poster );

								} ?>

							<?php elseif( get_row_layout() == 'project_audio' ) : ?>

								<?php // Audio

								$type = get_sub_field( 'audio_type' );

								if( $type == 'embed' ) {

									$embed = get_sub_field( 'audio_embed' );

									worx_embed( $post, $embed );

								} else {

									$url = get_sub_field( 'audio_url' );

									worx_audio( $post, $url );

								} ?>

					        <?php endif;

					    endwhile;

					endif; endif; ?>



						<?php // Thumbnail

						//worx_post_thumbnail( $thumb = 'full' ); ?>

						<div class="post-content">

							<header class="entry-header">

								<?php // Title

								the_title( '<h1 class="entry-title">', '</h1>' ); ?>

							</header><!-- END .entry-header -->

							<?php // Entry content

							if( $post->post_content != '' ) : ?>

							<div class="entry-content">

								<?php // Content

								the_content(); ?>

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