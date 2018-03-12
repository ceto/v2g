<?php
/**
 * Plugin Name: TVA Social
 * Plugin URI: http://themes.tienvooracht.nl/
 * Description: Enables custom social-icons widget and shortcode.
 * Version: 1.0.0
 * Author: D.J. ten Ham (Tienvooracht)
 * Author URI: http://www.tienvooracht.nl
 */

// Exit when cheating!
if( ! defined( 'ABSPATH' ) ) exit;

// Plugin Class
class TVA_Social {

	/**
	 * The constructor method for the TVA_Social class.
	 *
	 * @since 1.0.0
	 */

	public function __construct() {

		// Shortcode
		add_shortcode( 'tva_social', array( $this, 'shortcode_args' ) );

	}


	/**
	 * Registers shortcode
	 *
	 * @since 1.0.0
	 */

	// Shortcode arguments
	public function shortcode_args( $args ) {

		extract( shortcode_atts( array(

			'size'		=> '',
			'shape'		=> '',
			'networks'	=> '',
			'style'		=> '',

		), $args ) );

		return $this->tva_social_shortcode( $size, $shape, $networks, $style );

	}


	// Shortcode function
	public function tva_social_shortcode( $size, $shape, $networks, $style ) {

		// Networks
		$dribbble		= get_theme_mod( 'social_dribbble' );
		$facebook		= get_theme_mod( 'social_facebook' );
		$github			= get_theme_mod( 'social_github' );
		$google			= get_theme_mod( 'social_google' );
		$instagram		= get_theme_mod( 'social_instagram' );
		$linkedin		= get_theme_mod( 'social_linkedin' );
		$pinterest		= get_theme_mod( 'social_pinterest' );
		$twitter		= get_theme_mod( 'social_twitter' );
		$vimeo			= get_theme_mod( 'social_vimeo' );
		$youtube		= get_theme_mod( 'social_youtube' );

		// Turn variables into array
		$array = compact( 'dribbble', 'facebook', 'github', 'google', 'instagram', 'linkedin', 'pinterest', 'twitter', 'vimeo', 'youtube' );

		// Give array proper name
		$social_services = $array;

		// Start output
		$check_if_empty = array_filter( $social_services );

		if( ! empty( $check_if_empty ) ) :

		$html = '<div class="tva_social_icons">';

		foreach( $social_services as $name => $url ) {

			$icon = $name;

			if( empty( $networks ) ) {

				if( $url ) {

					$html .= '<a class="social-icon ' . esc_attr( $name ) . ' ' . esc_attr( $size ) . ' ' . esc_attr( $shape ) . ' ' . esc_attr( $style ) . '" title="' . esc_attr( $name ) . '" href="' . esc_url( $url ) . '"><i class="icon ion-social-' . esc_attr( $icon ) . '"></i></a>';

				}
	
			}

			if( strpos( $networks, $name ) !== false ) {

				if( $url ) {

					$html .= '<a class="social-icon ' . esc_attr( $name ) . ' ' . esc_attr( $size ) . ' ' . esc_attr( $shape ) . ' ' . esc_attr( $style ) . '" title="' . esc_attr( $name ) . '" href="' . esc_url( $url ) . '"><i class="icon ion-social-' . esc_attr( $icon ) . '"></i></a>';

				}

			}

		}

		$html .= '</div>';

		return $html;

		endif;

	}

}

$tva_social = new TVA_Social( __FILE__ );