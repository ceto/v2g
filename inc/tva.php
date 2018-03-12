<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * @package Worx
 */

/**
 * Register theme support
 */

if( function_exists( 'add_theme_support' ) ) {

	//add_theme_support( 'tva-portfolio' );
	//add_theme_support( 'tva-team' );
	//add_theme_support( 'tva-testimonials' );
	add_theme_support( 'social' );
	add_theme_support( 'share' );
	add_theme_support( 'icon-text-widget' );

}


/**
 * Custom Functions
 */

// Social
require_if_theme_supports( 'social', get_template_directory() . '/inc/functions/tva-social/tva-social.php' );

// Share
require_if_theme_supports( 'share', get_template_directory() . '/inc/functions/tva-share/tva-share.php' );


/**
 * Custom Widgets
 */

// Icon + Text
require_if_theme_supports( 'icon-text-widget', get_template_directory() . '/inc/widgets/tva-icon-text-widget/tva-icon-text-widget.php' );


/**
* The various elements that make up the project meta data.
*/

// Date
if( ! function_exists( 'worx_project_date' ) ) :

	function worx_project_date() {

		$date = get_field( '_project_date' );

		if( $date ) {

			printf( '<span class="meta-item project-date"><span class="meta-label">%1$s</span> %2$s</span>',
				esc_html_x( 'Date: ', 'Used before project date.', 'worx' ),
				esc_attr( $date )
			);

		}

	}

endif;


// Client
if( ! function_exists( 'worx_project_client' ) ) :

	function worx_project_client() {

		$client = get_field( '_project_client' );

		if( $client ) {

			printf( '<span class="meta-item project-client"><span class="meta-label">%1$s</span> %2$s</span>',
				esc_html_x( 'Client: ', 'Used before project client.', 'worx' ),
				esc_attr( $client )
			);

		}

	}

endif;


// Location
if( ! function_exists( 'worx_project_location' ) ) :

	function worx_project_location() {

		$location = get_field( '_project_location' );

		if( $location ) {

			printf( '<span class="meta-item project-location"><span class="meta-label">%1$s</span> %2$s</span>',
				esc_html_x( 'Location: ', 'Used before project location.', 'worx' ),
				esc_attr( $location )
			);

		}

	}

endif;


// URL
if( ! function_exists( 'worx_project_url' ) ) :

	function worx_project_url() {

		$url = get_field( '_project_url' );

		if( $url ) {

			printf( '<span class="meta-item project-url"><span class="meta-label">%1$s</span> <a href="%2$s">%2$s</a></span>',
				esc_html_x( 'URL: ', 'Used before project URL.', 'worx' ),
				esc_url( $url ),
				esc_attr__( 'Visit Project', 'worx' )
			);

		}

	}

endif;


// Categories
if( ! function_exists( 'worx_portfolio_categories' ) ) :

	function worx_portfolio_categories() {

		$categories_list = get_the_term_list( '', 'portfolio_category', '', ', ', '' );

		if( $categories_list ) {

			printf( '<span class="meta-item cat-links"><span class="meta-label">%1$s</span> %2$s</span>',
				esc_html_x( 'In: ', 'Used before category names.', 'worx' ),
				$categories_list
			);

		}

	}

endif;


// Tags
if( ! function_exists( 'worx_portfolio_tags' ) ) :

	function worx_portfolio_tags() {

		$tags_list = get_the_term_list( '', 'portfolio_tag', '', ', ', '' );

		if( $tags_list ) {

			printf( '<span class="meta-item tags-links"><span class="meta-label">%1$s</span> %2$s</span>',
				esc_html_x( 'Tags: ', 'Used before tag names.', 'worx' ),
				$tags_list
			);

		}

	}

endif;


// Meta data
if( ! function_exists( 'worx_portfolio_meta' ) ) :

	function worx_portfolio_meta( $date, $client, $location, $categories, $tags, $url ) {

		if( class_exists( 'ACF' ) ) :

		if( ( is_sticky() && is_home() && ! is_paged() ) ) {

			printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'worx' ) );

		}

		// Date
		if( $date ) { 
			worx_project_date();
		}

		// Client
		if( $client ) {
			worx_project_client();
		}

		// Location
		if( $location ) {
			worx_project_location();
		}

		// Categories
		if( $categories ) {
			worx_portfolio_categories();
		}

		// Tags
		if( $tags ) {
			worx_portfolio_tags();
		}

		// URL
		if( $url ) {
			worx_project_url();
		}

		endif;

	}

endif;


/**
 * Return the post URL.
 */

if( ! function_exists( 'worx_get_link_url' ) ) :

	function worx_get_link_url() {

		$has_url = get_url_in_content( get_the_content() );

		return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );

	}

endif;


/**
 * Register custom post_thumbnail function
 */

if( ! function_exists( 'worx_post_thumbnail' ) ) :

	function worx_post_thumbnail( $thumb ) {

		if( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {

			return;

		}

		if( is_singular() ) : ?>

			<div class="post-thumbnail">

				<?php the_post_thumbnail( 'full' ); ?>

			</div><!-- END .post-thumbnail -->

			<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">

				<?php the_post_thumbnail( $thumb, array( 'alt' => get_the_title() ) ); ?>

			</a><!-- END .post-thumbnail -->

		<?php endif;

	}

endif;


/**
 * Register custom gallery function
 */

if( ! function_exists( 'worx_gallery' ) ) :

	function worx_gallery( $post, $images, $ids ) {

		if( class_exists( 'ACF' ) ) :

		global $post;

		// Function
		if( $images ) { ?>

		<div class="post-media media-gallery columns-1">

			<?php echo do_shortcode( '[gallery ids="' . implode( ',', array_map( 'absint', $ids ) ) . '" columns="1" size="full" link="file"]' ); ?>

		</div><!-- END .post-media -->

		<?php }

		endif;

	}

endif;

function worx_add_rel_attribute( $link ) {

	global $post;

	return str_replace( '<a href', '<a rel="fancybox[' . $post->ID . ']" href', $link );

}

add_filter( 'wp_get_attachment_link', 'worx_add_rel_attribute' );


/**
 * Register custom carousel function
 */

if( ! function_exists( 'worx_carousel' ) ) :

	function worx_carousel( $post, $images ) {

		if( class_exists( 'ACF' ) ) :

		global $post;

		// Function
		if( $images ) { ?>

		<div class="post-media media-carousel">

			<div id="carousel-<?php the_ID(); ?>" class="flickity-carousel columns-1" data-align="left" data-nav="true" data-dots="false" data-draggable="true" data-accessibility="true" data-autoplay="false">
		
				<?php foreach( $images as $image ) : ?>
				<figure class="carousel-item">
					<!--<a href="<?php echo esc_url( $image['sizes']['full'] ); ?>">-->
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
					<!--</a>-->
					<?php if( $image['caption'] ) { ?>
					<figcaption class="wp-caption-text"><?php echo esc_attr( $image['caption'] ); ?></figcaption>
					<?php } ?>
				</figure>
				<?php endforeach; ?>
	
			</div>

		</div><!-- END .post-media -->

		<?php }

		endif;

	}

endif;


/**
 * Register custom embed function
 */

if( ! function_exists( 'worx_embed' ) ) :

	function worx_embed( $post, $embed ) {

		if( class_exists( 'ACF' ) ) :

		global $post;

		// Function
		if( $embed ) { ?>

		<div class="post-media media-embed">

			<?php echo $embed; ?>

		</div><!-- END .post-media -->

		<?php }

		endif;

	}

endif;


/**
 * Register custom video function
 */

if( ! function_exists( 'worx_video' ) ) :

	function worx_video( $post, $url ) {

		if( class_exists( 'ACF' ) ) :

		global $post;

		$poster = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

		// Function
		if( $url ) { ?>

		<div class="post-media media-video">

			<?php echo do_shortcode( '[video preload="auto" src="' . esc_html( $url ) . '" poster="' . esc_url( $poster[0] ) . '"]' ); ?>

		</div><!-- END .post-media -->

		<?php }

		endif;

	}

endif;


/**
 * Register custom audio function
 */

if( ! function_exists( 'worx_audio' ) ) :

	function worx_audio( $post, $url ) {

		if( class_exists( 'ACF' ) ) :

		global $post;

		// Function
		if( $url ) { ?>

		<div class="post-media media-audio">

			<?php worx_post_thumbnail( $thumb = 'full' ); ?>

			<?php echo do_shortcode( '[audio preload="auto" src="' . esc_url( $url ) . '"]' ); ?>

		</div><!-- END .post-media -->

		<?php }

		endif;

	}

endif;

