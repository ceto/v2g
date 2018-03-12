<?php
/**
 * Custom template tags for Worx
 *
 * @package Worx
 */

/**
 * Display navigation to next/previous comments when applicable.
 */
 
if( ! function_exists( 'worx_comment_nav' ) ) :

	function worx_comment_nav() {

		// Are there comments to navigate through?
		if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

		<nav class="navigation comment-navigation" role="navigation">

			<h2 class="meta-label"><?php _e( 'Comment navigation', 'worx' ); ?></h2>

			<div class="nav-links">

				<?php // Comment navigation

				if( $prev_link = get_previous_comments_link( __( 'Older Comments', 'worx' ) ) ) :

					printf( '<div class="nav-previous">%s</div>', $prev_link );

				endif;

				if( $next_link = get_next_comments_link( __( 'Newer Comments', 'worx' ) ) ) :

					printf( '<div class="nav-next">%s</div>', $next_link );

				endif; ?>

			</div><!-- END .nav-links -->

		</nav><!-- END .comment-navigation -->

		<?php endif;

	}

endif;


/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */

if( ! function_exists( 'worx_posts_navigation' ) ) :

	function worx_posts_navigation() {

	// Don't print empty markup if there's only one page.
	if( $GLOBALS['wp_query']->max_num_pages < 2 ) {

		return;

	} ?>

	<nav class="posts-navigation" role="navigation">

		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'worx' ); ?></h2>

		<div class="nav-links">

			<?php // Previous/next page navigation.

			if( $prev_link = get_previous_posts_link( __( '<span class="post-icon"><i class="icon ion-ios-arrow-back"></i></span><span class="post-title">Previous page</span>', 'worx' ) ) ) :
				printf( '<div class="nav-previous">%s</div>', $prev_link );
			endif;

			if( $next_link = get_next_posts_link( __( '<span class="post-title">Next page</span><span class="post-icon"><i class="icon ion-ios-arrow-forward"></i></span>', 'worx' ) ) ) :
				printf( '<div class="nav-next">%s</div>', $next_link );
			endif;

			?>

		</div><!-- END .nav-links -->

	</nav><!-- END .posts-navigation -->

	<?php }

endif;


/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */

if( ! function_exists( 'worx_post_navigation' ) ) :

	function worx_post_navigation() {

		global $post;

		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if( ! $next && ! $previous ) {

			return;

		} ?>

		<nav class="post-navigation" role="navigation">

			<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'worx' ); ?></h2>
	
			<div class="nav-links">

				<?php // Prev

				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="post-icon"><i class="icon ion-chevron-left"></i></span><span class="post-title">%title</span>', 'Previous post link', 'worx' ) ); ?>

				<?php // Home

				if( is_singular( 'portfolio_project' ) ) {

					$url = get_permalink( get_theme_mod( 'page_portfolio', esc_url( home_url() ) ) );

				} else {

					$url = get_option( 'page_for_posts' );

				} ?>

				<div class="nav-home"><span class="post-icon"><a href="<?php echo esc_url( $url ); ?>"><i class="icon ion-grid"></i></a></span></div>

				<?php // Next

				next_post_link( '<div class="nav-next">%link</div>', _x( '<span class="post-title">%title</span><span class="post-icon"><i class="icon ion-chevron-right"></i></span>', 'Next post link', 'worx' ) ); ?>

			</div><!-- END .nav-links -->

		</nav><!-- END .post-navigation -->

	<?php }

endif;


/**
* The various elements that make up the post meta data.
*/

// Format
if( ! function_exists( 'worx_post_format' ) ) :

	function worx_post_format() {

		//$format = get_post_format();

		//if( current_theme_supports( 'post-formats', $format ) ) {

			$format = ( has_post_format() ) ? get_post_format_string( get_post_format() ) : esc_html_x( 'Standard', 'worx' );

			//printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			printf( '<span class="meta-item entry-format">%1$s %2$s</span>',
				sprintf( '<span class="meta-label">%s</span>', esc_html_x( 'Format', 'worx' ) ),
				$format
			);

		//}

	}

endif;


// Avatar
if( ! function_exists( 'worx_avatar' ) ) :

	function worx_avatar() {

		//if( is_multi_author() ) {

			printf( '%1$s',
				get_avatar( get_the_author_meta( 'ID' ) )
			);

		//}

	}

endif;


// Authors
if( ! function_exists( 'worx_authors' ) ) :

	function worx_authors() {

		//if( is_multi_author() ) {

			printf( '<span class="meta-item byline"><span class="author vcard"><span class="meta-label">%1$s</span> <a class="url fn n" href="%2$s">%3$s</a></span></span>',
				esc_html_x( 'By ', 'Used before post author name.', 'worx' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			);

		//}

	}

endif;


// Post date
if( ! function_exists( 'worx_posted_on' ) ) :

	function worx_posted_on() {

		if( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {

			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				get_the_date(),
				esc_attr( get_the_modified_date( 'c' ) ),
				get_the_modified_date()
			);

			printf( '<span class="meta-item posted-on"><span class="meta-label">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
				_x( 'On ', 'Used before publish date.', 'worx' ),
				esc_url( get_permalink() ),
				$time_string
			);

		}

	}

endif;


// Categories
if( ! function_exists( 'worx_categories' ) ) :

	function worx_categories() {

		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'worx' ) );

		if( $categories_list ) {

			printf( '<span class="meta-item cat-links"><span class="meta-label">%1$s</span> %2$s</span>',
				esc_html_x( 'In ', 'Used before category names.', 'worx' ),
				$categories_list
			);

		}

	}

endif;


// Tags
if( ! function_exists( 'worx_tags' ) ) :

	function worx_tags( $tag = 'span' ) {

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'worx' ) );

		if( $tags_list ) {

			printf( '<span class="meta-item tags-links"><span class="meta-label">%1$s</span> %2$s</span>',
				esc_html_x( 'Tagged ', 'Used before tag names.', 'worx' ),
				$tags_list
			);

		}

	}

endif;


// Attachment
if( ! function_exists( 'worx_attachment_metadata' ) ) :

	function worx_attachment_metadata() {

		if( is_attachment() && wp_attachment_is_image() ) {

			// Retrieve attachment metadata.
			$metadata = wp_get_attachment_metadata();

			printf( '<span class="meta-item full-size-link"><span class="meta-label">%1$s</span> <a href="%2$s">%3$s &times; %4$s</a></span>',
				esc_html_x( 'Full size ', 'Used before full size attachment link.', 'worx' ),
				esc_url( wp_get_attachment_url() ),
				$metadata['width'],
				$metadata['height']
			);

		}

	}

endif;


// Comments
if( ! function_exists( 'worx_comments' ) ) :

	function worx_comments() {

		if( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

			echo '<span class="meta-item comments-link">';
			echo '<span class="meta-label">';
			echo esc_html_x( 'Comments', 'worx' );
			echo '</span> ';
			comments_popup_link( esc_html__( 'Leave a comment', 'worx' ), esc_html__( '1 Comment', 'worx' ), esc_html__( '% Comments', 'worx' ) );
			echo '</span>';

		}

	}

endif;


// Meta data
if( ! function_exists( 'worx_entry_meta' ) ) :

	function worx_entry_meta( $format, $avatar, $date, $author, $categories, $tags, $attachment, $comments ) {

		if( ( is_sticky() && is_home() && ! is_paged() ) ) {

			printf( '<span class="meta-item sticky-post"><i class="icon ion-pin"></i><span class="meta-label">%s</span></span>', __( 'Featured', 'worx' ) );

		}

		// Format
		if( $format ) {
			worx_post_format();
		}

		// Avatar
		if( $avatar ) {
			worx_avatar();
		}

		// Date
		if( $date ) { 
			worx_posted_on();
		}

		// Author
		if( $author ) {
			worx_authors();
		}

		// Categories
		if( $categories ) {
			worx_categories();
		}

		// Tags
		if( $tags ) {
			worx_tags();
		}

		// Metadata
		if( $attachment ) {
			worx_attachment_metadata();
		}

		// Comments
		if( $comments ) {
			worx_comments();
		}

	}

endif;

	
/**
 * Returns true if a blog has more than 1 category.
 */

function worx_categorized_blog() {

	if( false === ( $all_the_cool_cats = get_transient( 'worx_categories' ) ) ) {

		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'worx_categories', $all_the_cool_cats );

	}

	if( $all_the_cool_cats > 1 ) {

		// This blog has more than 1 category so worx_categorized_blog should return true.
		return true;

	} else {

		// This blog has only 1 category so worx_categorized_blog should return false.
		return false;

	}

}


/**
 * Sets custom excerpt lengt (in words).
 */
 
if( ! function_exists( 'worx_excerpt_length' ) ) :

	function worx_excerpt_length( $length ) {

		return 30;

	}

	add_filter( 'excerpt_length', 'worx_excerpt_length' );

endif;


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a Continue reading link.
 */
 
if( ! function_exists( 'worx_excerpt_more' ) && ! is_admin() ) :

	function worx_excerpt_more( $more ) {

		$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
			esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( esc_html__( 'Continue reading %s', 'worx' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
			);

		return ' &hellip; ' . $link;

	}
	
	add_filter( 'excerpt_more', 'worx_excerpt_more' );

endif;


/**
* Filters wp_title to print a neat <title> tag based on what is being viewed.
*
* @param string $title Default title text for current view.
* @param string $sep Optional separator.
* @return string The filtered title.
*/

if( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :

	function worx_wp_title( $title, $sep ) {

		if( is_feed() ) {

			return $title;

		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );

		if( $site_description && ( is_home() || is_front_page() ) ) {

			$title .= " $sep $site_description";

		}
		
		// Add a page number if necessary:
		if( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {

			$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );

		}
	
		return $title;

	}
	
	add_filter( 'wp_title', 'worx_wp_title', 10, 2 );
	

	/**
	* Title shim for sites older than WordPress 4.1.
	*
	* @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	* @todo Remove this function when WordPress 4.3 is released.
	*/

	function worx_render_title() { ?>
	
		<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<?php }
	
	add_action( 'wp_head', 'worx_render_title' );

endif;

