<?php
/**
 * Plugin Name: TVA Share
 * Plugin URI: http://themes.tienvooracht.nl/
 * Description: Enables custom social share links.
 * Version: 1.0.0
 * Author: D.J. ten Ham (Tienvooracht)
 * Author URI: http://www.tienvooracht.nl
 */

// Exit when cheating!
if( ! defined( 'ABSPATH' ) ) exit;

// Plugin Class
class TVA_Share {

	/**
	 * The constructor method for the TVA_Share class.
	 *
	 * @since 1.0.0
	 */

	public function __construct() {

		// Shortcode
		add_shortcode( 'tva_share', array( $this, 'shortcode_args' ) );

	}


	/**
	 * Registers shortcode
	 *
	 * @since 1.0.0
	 */

	// Shortcode arguments
	public function shortcode_args( $args ) {

		extract( shortcode_atts( array(

			'networks'	=> ''

		), $args ) );

		return $this->tva_share_shortcode( $networks );

	}


	// Shortcode function
	public function tva_share_shortcode( $networks ) {

		global $post;

		// Networks
		$twitter		= get_theme_mod( 'share_twitter', true );
		$facebook		= get_theme_mod( 'share_facebook', true );
		$google			= get_theme_mod( 'share_google', true );
		$linkedin		= get_theme_mod( 'share_linkedin', true );
		$pinterest		= get_theme_mod( 'share_pinterest', true );

		// Turn variables into array
		$array = compact( 'twitter', 'facebook', 'google', 'linkedin', 'pinterest' );

		// Give array proper name
		$social_services = $array;

		// Start output
		$check_if_empty = array_filter( $social_services );

		// Image
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail', false );

		if( ! empty( $check_if_empty ) ) :

		$html = '<span class="tva-item tva-share">';

			$html .= '<a class="trigger-share-panel" href="#"><i class="icon ion-android-share-alt"></i><span class="label">' . __( 'Share', 'worx' ) . '</span></a>';

			$html .= '<div class="share-panel">';

			$html .= '<div class="share">' . __( 'Share', 'worx' ) . '</div>';

			$html .= '<ul>';

			if( empty( $networks ) ) {

				if( $twitter ) {
				$html .= '<li><a class="twitter" href="http://twitter.com/intent/tweet?text=' . get_the_title() . '&amp;url=' . esc_url( get_permalink() ) . '" target="_blank"><i class="icon ion-social-twitter"></i><span class="label">Twitter</span></a></li>';
				}

				if( $facebook ) {
				$html .= '<li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url( get_permalink() ) . '" target="_blank"><i class="icon ion-social-facebook"></i><span class="label">Facebook</span></a></li>';
				}

				if( $google ) {
				$html .= '<li><a class="google" href="https://plus.google.com/share?url=' . esc_url( get_permalink() ) . '" target="_blank"><i class="icon ion-social-googleplus"></i><span class="label">Google+</span></a></li>';
				}

				if( $linkedin ) {
				$html .= '<li><a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=' . esc_url( get_permalink() ) . '&amp;title=' . get_the_title() . '" target="_blank"><i class="icon ion-social-linkedin"></i><span class="label">LinkedIN</span></a></li>';
				}

				if( $pinterest ) {
				$html .= '<li><a class="pinterest" href="http://pinterest.com/pin/create/button/?url=' . esc_url( get_permalink() ) . '&amp;is_video=false&amp;description=' . get_the_title() . '" target="_blank"><i class="icon ion-social-pinterest"></i><span class="label">Pinterest</span></a></li>';
				}

			}

			if( $networks !== false ) {

				if( $twitter == ! '' && strpos( $networks, 'twitter' ) !== false ) {
				$html .= '<li><a class="twitter" href="http://twitter.com/intent/tweet?text=' . get_the_title() . '&amp;url=' . esc_url( get_permalink() ) . '" target="_blank"><i class="icon ion-social-twitter"></i><span class="label">Twitter</span></a></li>';
				}

				if( $facebook == ! '' && strpos( $networks, 'facebook' ) !== false ) {
				$html .= '<li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url( get_permalink() ) . '" target="_blank"><i class="icon ion-social-facebook"></i><span class="label">Facebook</span></a></li>';
				}

				if( $google == ! '' && strpos( $networks, 'google' ) !== false ) {
				$html .= '<li><a class="google" href="https://plus.google.com/share?url=' . esc_url( get_permalink() ) . '" target="_blank"><i class="icon ion-social-googleplus"></i><span class="label">Google+</span></a></li>';
				}

				if( $linkedin == ! '' && strpos( $networks, 'linkedin' ) !== false ) {
				$html .= '<li><a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=' . esc_url( get_permalink() ) . '&amp;title=' . get_the_title() . '" target="_blank"><i class="icon ion-social-linkedin"></i><span class="label">LinkedIN</span></a></li>';
				}

				if( $pinterest == ! '' && strpos( $networks, 'pinterest' ) !== false ) {
				$html .= '<li><a class="pinterest" href="http://pinterest.com/pin/create/button/?url=' . esc_url( get_permalink() ) . '&amp;is_video=false&amp;description=' . get_the_title() . '" target="_blank"><i class="icon ion-social-pinterest"></i><span class="label">Pinterest</span></a></li>';
				}

			}

			$html .= '</ul>';

			$html .= '</div>';

		$html .= '</span>';

		return $html;

		endif;

	}

}

$tva_share = new TVA_Share( __FILE__ );