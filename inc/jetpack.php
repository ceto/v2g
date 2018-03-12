<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Worx
 */

function worx_jetpack_setup() {

	// Infinite scroll
	add_theme_support( 'infinite-scroll', array(

			'type'				=> 'click',
			'footer_widgets'	=> false,
			'container'			=> 'main',
			'wrapper'        	=> false,
			'footer'			=> false,
			'render'         	=> 'render_function',
			'posts_per_page'	=> false,

	) );

	// Render
	function render_function() {

		while( have_posts() ) :

			the_post();

			if( get_post_type() == 'portfolio_project' && ! is_search() ) {

				get_template_part( 'content', 'portfolio' );

			} elseif( is_search() ) {

				get_template_part( 'content', 'search' );

			} else {

				get_template_part( 'content', get_post_format() );

			}

		endwhile;

	}

}

add_action( 'after_setup_theme', 'worx_jetpack_setup' );
