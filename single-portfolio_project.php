<?php
/**
 * The default template for displaying single portfolio content.
 *
 * @package Worx
 */

get_header(); ?>

	<div class="main-container">

		<div class="center-content">

		<div id="primary" class="content-area intro-area">

			<main id="main" class="site-main" role="main">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="post-content">

						<header class="entry-header">

							<?php // Title

							the_title( '<h1 class="entry-title">', '</h1>' ); ?>

							<?php // Subtitle

							//if( function_exists( 'the_subtitle' ) ) {

							//	the_subtitle( '<p class="entry-subtitle">', '</p>' );

							//} ?>

						</header><!-- END .entry-header -->
						<footer class="entry-footer">

								<?php // Meta

								worx_portfolio_meta( $date = false, $client = true, $location = true, $categories = true, $tags = true, $url = false ); ?>


						</footer><!-- END .entry-footer -->




						<?php // Entry content

						if( $post->post_content != '' ) : ?>

						<div class="entry-content">

							<?php the_post(); ?>

							<?php // Content

							the_content( sprintf(
								__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'worx' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )

							) ); ?>

							<?php // Link pages

							wp_link_pages( array(

								'before' => '<div class="page-links">' . __( 'Pages:', 'worx' ),
								'after'  => '</div>',

							) ); ?>

						</div><!-- END .entry-content -->

						<?php endif; ?>
					</div><!-- END .post-content -->


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

					<div class="post-content">

						<footer class="entry-footer">

								<?php // Meta

								worx_portfolio_meta( $date = false, $client = true, $location = true, $categories = true, $tags = true, $url = false ); ?>


								<br><br>

								<?php // Share

								if( esc_attr( get_theme_mod( 'enable_share', true ) ) ) :

									echo do_shortcode( '[tva_share]' );

								endif; ?>

						</footer><!-- END .entry-footer -->
					</div>


				</article><!-- END #post-<?php the_ID(); ?> -->

			</main><!-- END .site-main -->

		</div><!-- END .content-area -->

		</div>

	</div><!-- END .main-container -->

	<?php // Comments

	if( comments_open() || get_comments_number() ) :

		comments_template( '', true );

	endif; ?>

  <?php // worx_post_navigation(); ?>


<?php
	yarpp_related(
          array(
            // Pool options: these determine the "pool" of entities which are considered
            'post_type' => array('portfolio_project' ),
            'show_pass_post' => false, // show password-protected posts
            'past_only' => false, // show only posts which were published before the reference post
            'exclude' => array(), // a list of term_taxonomy_ids. entities with any of these terms will be excluded from consideration.
            'recent' => false, // to limit to entries published recently, set to something like '15 day', '20 week', or '12 month'.
            // Relatedness options: these determine how "relatedness" is computed
            // Weights are used to construct the "match score" between candidates and the reference post
            'weight' => array(
                'body' => 0,
                'title' => 0,
                'tax' => array(
                  'portfolio_tag' => 2,
                  'portfolio_category' => 2,
                  'portfolio_feature' => 2

                )
            ),
            // Specify taxonomies and a number here to require that a certain number be shared:
            'require_tax' => array(
                'portfolio_category' => 1, // for example, this requires all results to have at least one 'post_tag' in common.
                //'portfolio_type' => 1,
                'portfolio_feature' => 1,
                'portfolio_tag' => 1
            ),
            // The threshold which must be met by the "match score"
            'threshold' => 4,
            // Display options:
            'template' => 'yarpp-related-tiles.php', // either the name of a file in your active theme or the boolean false to use the builtin template
            'limit' => 10, // maximum number of results
            'order' => 'score DESC'
          ),
          $post->ID, // second argument: (optional) the post ID. If not included, it will use the current post.
          true
        ); // third argument: (optional) true to echo the HTML block; false to return it
  ?>





<?php // Footer

get_footer(); ?>