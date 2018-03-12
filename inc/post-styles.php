<?php
/**
 * Post Styling
 *
 * Add WYSIWYG post styling functionality.
 *
 * @package Worx
 */

// Exit if conditions are met
if( ! defined( 'ABSPATH' ) ) exit;


/**
 * TinyMCE add-ons
 */

// Font-size select
if( ! function_exists( 'worx_mce_buttons' ) ) {

	function worx_mce_buttons( $buttons ) {

		array_unshift( $buttons, 'fontsizeselect' );

		return $buttons;

	}

	add_filter( 'mce_buttons_2', 'worx_mce_buttons' );

}


// Formats dropdown
if( ! function_exists( 'worx_style_select' ) ) {

	function worx_style_select( $buttons ) {

		array_unshift( $buttons, 'styleselect' );

		return $buttons;

	}

	add_filter( 'mce_buttons_2', 'worx_style_select' );

}


// New styles for formats dropdown
if( ! function_exists( 'worx_post_styles' ) ) {

	function worx_post_styles( $settings ) {

		// Create array of new styles
		$new_styles = array(

			array(

				'title'	=> __( 'Buttons', 'worx' ),
				'items'	=> array(

					array(
	
						'title'		=> __( 'Button', 'worx' ),
						'selector'	=> 'a',
						'classes'	=> 'button'

					),
					array(
	
						'title'		=> __( 'Red Button', 'worx' ),
						'selector'	=> 'a[class*="button"]',
						'classes'	=> 'red'

					),
					array(
	
						'title'		=> __( 'Yellow Button', 'worx' ),
						'selector'	=> 'a[class*="button"]',
						'classes'	=> 'yellow'

					),
					array(
	
						'title'		=> __( 'Green Button', 'worx' ),
						'selector'	=> 'a[class*="button"]',
						'classes'	=> 'green'

					),
					array(
	
						'title'		=> __( 'Blue Button', 'worx' ),
						'selector'	=> 'a[class*="button"]',
						'classes'	=> 'blue'

					),
					array(
	
						'title'		=> __( 'Purple Button', 'worx' ),
						'selector'	=> 'a[class*="button"]',
						'classes'	=> 'purple'

					),
					array(
	
						'title'		=> __( 'Orange Button', 'worx' ),
						'selector'	=> 'a[class*="button"]',
						'classes'	=> 'orange'

					),
					array(
	
						'title'		=> __( 'Small Button', 'worx' ),
						'selector'	=> 'a[class*="button"]',
						'classes'	=> 'small'

					),
					array(

						'title'		=> __( 'Normal Button', 'worx' ),
						'selector'	=> 'a[class*="button"]',
						'classes'	=> 'normal'

					),
					array(

						'title'		=> __( 'Big Button', 'worx' ),
						'selector'	=> 'a[class*="button"]',
						'classes'	=> 'big'

					),
					array(

						'title'		=> __( 'Full Width Button', 'worx' ),
						'selector'	=> 'a[class*="button"]',
						'classes'	=> 'full-width'

					),

				),

			),
			array(

				'title'	=> __( 'Pull Quotes', 'worx' ),
				'items'	=> array(

					array(
	
						'title'		=> __( 'Left Pull Quote', 'worx' ),
						'selector'	=> 'blockquote',
						'classes'	=> 'pullquote alignleft'

					),
					array(
	
						'title'		=> __( 'Right Pull Quote', 'worx' ),
						'selector'	=> 'blockquote',
						'classes'	=> 'pullquote alignright'

					),

				),

			),
			array(

				'title'	=> __( 'Alerts', 'worx' ),
				'items'	=> array(

					array(
	
						'title'		=> __( 'Alert', 'worx' ),
						'block'		=> 'div',
						'classes'	=> 'alert'

					),
					array(
	
						'title'		=> __( 'Grey Alert', 'worx' ),
						'block'		=> 'div',
						'classes'	=> 'alert grey'

					),
					array(
	
						'title'		=> __( 'Red Alert', 'worx' ),
						'block'		=> 'div',
						'classes'	=> 'alert red'

					),
					array(
	
						'title'		=> __( 'Yellow Alert', 'worx' ),
						'block'		=> 'div',
						'classes'	=> 'alert yellow'

					),
					array(
	
						'title'		=> __( 'Green Alert', 'worx' ),
						'block'		=> 'div',
						'classes'	=> 'alert green'

					),
					array(
	
						'title'		=> __( 'Blue Alert', 'worx' ),
						'block'		=> 'div',
						'classes'	=> 'alert blue'

					),

				),

			),
			array(

				'title'	=> __( 'Columns', 'worx' ),
				'items'	=> array(

					array(
	
						'title'		=> __( '2 Columns', 'worx' ),
						'block'		=> 'p',
						'classes'	=> 'two-columns'

					),
					array(
	
						'title'		=> __( '3 Columns', 'worx' ),
						'block'		=> 'p',
						'classes'	=> 'three-columns'

					),
					array(
	
						'title'		=> __( '4 Columns', 'worx' ),
						'block'		=> 'p',
						'classes'	=> 'four-columns'

					),

				),

			),
			array(

				'title'	=> __( 'Misc', 'worx' ),
				'items'	=> array(

					array(
	
						'title'		=> __( 'Intro', 'worx' ),
						'inline'	=> 'span',
						'classes'	=> 'intro'

					),
					array(
	
						'title'		=> __( 'Highlight', 'worx' ),
						'inline'	=> 'span',
						'classes'	=> 'highlight'

					),

				),

			),

		);

		// Merge old & new styles
		$settings['style_formats_merge'] = false;

		// Add new styles
		$settings['style_formats'] = json_encode( $new_styles );

		// Return New Settings
		return $settings;

	}

	add_filter( 'tiny_mce_before_init', 'worx_post_styles' );

}

