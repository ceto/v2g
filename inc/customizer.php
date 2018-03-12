<?php
/**
 * Customizer functionality
 *
 * @package Worx
 */

$GLOBALS['accent'] = '#16a5f3';

$GLOBALS['footer_background'] = '#3b4651';

$GLOBALS['site_title_link'] = '#212222';
$GLOBALS['tagline_text'] = '#878888';

$GLOBALS['primary_navigation_link'] = '#878888';

$GLOBALS['primary_text'] = '#434444';
$GLOBALS['primary_link'] = '#434444';

$GLOBALS['primary_headings'] = '#212222';
$GLOBALS['secondary_headings'] = '#212222';
$GLOBALS['footer_headings'] = '#ffffff';

$GLOBALS['meta_text'] = '#878888';
$GLOBALS['meta_link'] = '#878888';

$GLOBALS['secondary_text'] = '#434444';
$GLOBALS['secondary_link'] = '#878888';

$GLOBALS['footer_text'] = '#b1b5b9';
$GLOBALS['footer_link'] = '#ffffff';

$GLOBALS['homepage_portfolio_items'] = 4;
$GLOBALS['portfolio_items'] = 10;


/**
 * Convert HEX to RGB.
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 * HEX code, empty array otherwise.
 */

function worx_hex2rgb( $color ) {

	$color = trim( $color, '#' );
	
	if( strlen( $color ) == 3 ) {

		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );

	} elseif( strlen( $color ) == 6 ) {

		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );

	} else {

		return array();

	}

	return array( 'r' => $r, 'g' => $g, 'b' => $b );

}




/**
 * Customizer class
 */

class worx_Customize {

	public static function customize_register( $wp_customize ) {


		// Site title & Tagline
		$wp_customize->add_section( 'title_tagline', array(

			'title'				=> esc_html__( 'Site title & tagline', 'worx' ),
			'description'		=> '',
			'priority'			=> 10,

		) );

		// Remove
		//$wp_customize->remove_control( 'display_header_text' );

		// Transport
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';




		// Logo & favicon
		$wp_customize->add_section( 'logo_favicon', array(

			'title'				=> esc_html__( 'Logo & favicon', 'worx' ),
			'description'		=> '',
			'priority'			=> 20,

		) );

			// Custom logo
			$wp_customize->add_setting( 'logo', array(

				'default'			=> '',
				'sanitize_callback' => 'esc_url_raw',

			) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(

				'label'				=> __( 'Logo', 'worx' ),
				'section'			=> 'logo_favicon',
				'settings'			=> 'logo',
				'type'				=> 'image',

			) ) );

			// Custom logo (retina)
			$wp_customize->add_setting( 'logo_retina', array(

				'default'			=> '',
				'sanitize_callback' => 'esc_url_raw',

			) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_retina', array(

				'label'				=> __( 'Logo (Retina)', 'worx' ),
				'description'		=> __( 'If your logo is called logo.png make sure your retina logo is called logo@2x.png.', 'worx' ),
				'section'			=> 'logo_favicon',
				'settings'			=> 'logo_retina',
				'type'				=> 'image',

			) ) );

			// Custom favicon
			$wp_customize->add_setting( 'favicon', array(

				'default'			=> '',
				'sanitize_callback' => 'esc_url_raw',

			) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'favicon', array(

				'label'				=> __( 'Favicon', 'worx' ),
				'section'			=> 'logo_favicon',
				'settings'			=> 'favicon',
				'type'				=> 'image',

			) ) );




		// Static front page
		$wp_customize->add_section( 'static_front_page', array(

			'title'				=> __( 'Static front page', 'worx' ),
			'description'		=> '',
			'priority'			=> 30,

		) );




		// Navigation
		$wp_customize->add_section( 'nav', array(

			'title'				=> __( 'Navigation', 'worx' ),
			'description'		=> '',
			'priority'			=> 40,

		) );




		// Custom styles
		$wp_customize->add_section( 'colors', array(

			'title'				=> esc_html__( 'Colors', 'worx' ),
			'description'		=> '',
			'priority'			=> 60,

		) );

			// Accent
			$wp_customize->add_setting( 'accent', array(

				'default'			=> $GLOBALS['accent'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent', array(

				'label'				=> __( 'Accent', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'accent',
				'type'				=> 'color',

			) ) );


			// Footer Background
			$wp_customize->add_setting( 'footer_background', array(
	
				'default'			=> $GLOBALS['footer_background'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color',
	
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background', array(
		
				'label'				=> __( 'Footer Background', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'footer_background',
				'type'				=> 'color',
	
			) ) );


			// Site title link
			$wp_customize->add_setting( 'site_title_link', array(

				'default'			=> $GLOBALS['site_title_link'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_title_link', array(
	
				'label'				=> __( 'Site title', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'site_title_link',
				'type'				=> 'color',

			) ) );


			// Tagline text
			$wp_customize->add_setting( 'tagline_text', array(

				'default'			=> $GLOBALS['tagline_text'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tagline_text', array(
	
				'label'				=> __( 'Tagline', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'tagline_text',
				'type'				=> 'color',

			) ) );


			// Navigation link
			$wp_customize->add_setting( 'primary_navigation_link', array(

				'default'			=> $GLOBALS['primary_navigation_link'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_navigation_link', array(
	
				'label'				=> __( 'Navigation link', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'primary_navigation_link',
				'type'				=> 'color',

			) ) );


			// Primary text
			$wp_customize->add_setting( 'primary_text', array(

				'default'			=> $GLOBALS['primary_text'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_text', array(
	
				'label'				=> __( 'Primary text', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'primary_text',
				'type'				=> 'color',

			) ) );

			// Primary link
			$wp_customize->add_setting( 'primary_link', array(

				'default'			=> $GLOBALS['primary_link'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_link', array(
	
				'label'				=> __( 'Primary link', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'primary_link',
				'type'				=> 'color',

			) ) );


			// Primary headings
			$wp_customize->add_setting( 'primary_headings', array(

				'default'			=> $GLOBALS['primary_headings'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_headings', array(
	
				'label'				=> __( 'Primary headings', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'primary_headings',
				'type'				=> 'color',

			) ) );


			// Secondary headings
			$wp_customize->add_setting( 'secondary_headings', array(

				'default'			=> $GLOBALS['secondary_headings'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_headings', array(
	
				'label'				=> __( 'Secondary headings', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'secondary_headings',
				'type'				=> 'color',

			) ) );

			// Footer headings
			$wp_customize->add_setting( 'footer_headings', array(

				'default'			=> $GLOBALS['footer_headings'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_headings', array(
	
				'label'				=> __( 'Footer headings', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'footer_headings',
				'type'				=> 'color',

			) ) );
	

			// Meta text
			$wp_customize->add_setting( 'meta_text', array(

				'default'			=> $GLOBALS['meta_text'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'meta_text', array(

				'label'				=> __( 'Meta text', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'meta_text',
				'type'				=> 'color',

			) ) );

			// Meta link
			$wp_customize->add_setting( 'meta_link', array(

				'default'			=> $GLOBALS['meta_link'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'meta_link', array(

				'label'				=> __( 'Meta link', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'meta_link',
				'type'				=> 'color',

			) ) );


			// Secondary text
			$wp_customize->add_setting( 'secondary_text', array(

				'default'			=> $GLOBALS['secondary_text'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_text', array(

				'label'				=> __( 'Sidebar text', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'secondary_text',
				'type'				=> 'color',

			) ) );

			// Secondary link
			$wp_customize->add_setting( 'secondary_link', array(

				'default'			=> $GLOBALS['secondary_link'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_link', array(

				'label'				=> __( 'Sidebar link', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'secondary_link',
				'type'				=> 'color',

			) ) );


			// Footer text
			$wp_customize->add_setting( 'footer_text', array(

				'default'			=> $GLOBALS['footer_text'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text', array(

				'label'				=> __( 'Footer text', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'footer_text',
				'type'				=> 'color',

			) ) );

			// Footer link
			$wp_customize->add_setting( 'footer_link', array(

				'default'			=> $GLOBALS['footer_link'],
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color', 

			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link', array(

				'label'				=> __( 'Footer link', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'footer_link',
				'type'				=> 'color',

			) ) );


			// Custom CSS
			$wp_customize->add_setting( 'custom_css', array(

				'default'			=> '',
				'transport'			=> 'refresh',
				'sanitize_callback' => 'worx_sanitize_text', 

			) );

			$wp_customize->add_control( 'custom_css', array(
	
				'label'				=> __( 'Custom CSS', 'worx' ),
				'section'			=> 'colors',
				'settings'			=> 'custom_css',
				'type'				=> 'textarea',

			) );



		// Theme
		$wp_customize->add_section( 'theme', array(

			'title'				=> esc_html__( 'Theme Settings', 'worx' ),
			'description'		=> '',
			'priority'			=> 70,

		) );


			// Tagline
			$wp_customize->add_setting( 'enable_tagline', array(

				'default'			=> true,
				'transport'			=> 'refresh',
				'sanitize_callback' => 'worx_sanitize_checkbox',

			) );

			$wp_customize->add_control( 'enable_tagline', array(

				'label'				=> __( 'Enable the tagline', 'worx' ),
				'section'			=> 'theme',
				'settings'			=> 'enable_tagline',
				'type'				=> 'checkbox',

			) );


			// Header - byline
			$wp_customize->add_setting( 'header_byline', array(

				'default'			=> '',
				//'transport'			=> 'postMessage',
				'sanitize_callback' => 'worx_sanitize_textarea',

			) );

			$wp_customize->add_control( 'header_byline', array(

				'label'				=> __( 'Header byline', 'worx' ),
				'description'		=> __( 'Add additional content to the header.', 'worx' ),
				'section'			=> 'theme',
				'settings'			=> 'header_byline',
				'type'				=> 'textarea',

			) );


			// Homepage - Portfolio - Posts per page
			$wp_customize->add_setting( 'homepage_portfolio_posts_per_page', array(

				'default'			=> $GLOBALS['homepage_portfolio_items'],
				'transport'			=> 'refresh',
				'sanitize_callback' => 'worx_sanitize_number',

			) );

			$wp_customize->add_control( 'homepage_portfolio_posts_per_page', array(

				'label'				=> __( '# portfolio items (homepage)', 'worx' ),
				'description'		=> '',
				'section'			=> 'theme',
				'settings'			=> 'homepage_portfolio_posts_per_page',
				'type'				=> 'number',

			) );


			// Page - Portfolio
			$wp_customize->add_setting( 'page_portfolio', array(

				'default'			=> true,
				'transport'			=> 'refresh',
				'sanitize_callback' => 'absint',

			) );

			$wp_customize->add_control( 'page_portfolio', array(

				'label'				=> __( 'Page set as portfolio', 'worx' ),
				'section'			=> 'theme',
				'settings'			=> 'page_portfolio',
				'type'				=> 'dropdown-pages',

			) );


			// Portfolio - Posts per page
			$wp_customize->add_setting( 'portfolio_posts_per_page', array(

				'default'			=> $GLOBALS['portfolio_items'],
				'transport'			=> 'refresh',
				'sanitize_callback' => 'worx_sanitize_number',

			) );

			$wp_customize->add_control( 'portfolio_posts_per_page', array(

				'label'				=> __( '# portfolio items (portfolio page)', 'worx' ),
				'description'		=> '',
				'section'			=> 'theme',
				'settings'			=> 'portfolio_posts_per_page',
				'type'				=> 'number',

			) );


			// Footer - byline
			$wp_customize->add_setting( 'footer_byline', array(

				'default'			=> '',
				//'transport'			=> 'postMessage',
				'sanitize_callback' => 'worx_sanitize_textarea',

			) );

			$wp_customize->add_control( 'footer_byline', array(

				'label'				=> __( 'Footer byline', 'worx' ),
				'description'		=> __( 'Add additional content to the footer.', 'worx' ),
				'section'			=> 'theme',
				'settings'			=> 'footer_byline',
				'type'				=> 'textarea',

			) );




		// Widgets
		$wp_customize->add_section( 'widgets', array(

			'title'				=> __( 'Widgets', 'worx' ),
			'description'		=> '',
			'priority'			=> 200,

		) );




		//if( class_exists( 'TVA_Social' ) ) :

		// Social Settings
		$wp_customize->add_section( 'social', array(
	
			'title'				=> esc_html__( 'Social Icons Settings', 'worx' ),
			'description'		=> __( 'Add links to you favorite social networks and display them using the [tva_social] shortcode or the Social Icons widget.', 'worx' ),
			'priority'			=> 300,
			'active_callback'	=> 'worx_social',

		) );


			// Dribbble
			$wp_customize->add_setting( 'social_dribbble', array(

				'default'			=> '',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'worx_sanitize_url',

			) );

			$wp_customize->add_control( 'social_dribbble', array(

				'label'				=> __( 'Dribbble', 'worx' ),
				'description'		=> '',
				'section'			=> 'social',
				'settings'			=> 'social_dribbble',
				'type'				=> 'url',
				'input_attrs' 		=> array(
					'placeholder'	=> __( 'http://', 'worx' ),
				),

			) );

			// Facebook
			$wp_customize->add_setting( 'social_facebook', array(

				'default'			=> '',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'worx_sanitize_url',

			) );

			$wp_customize->add_control( 'social_facebook', array(

				'label'				=> __( 'Facebook', 'worx' ),
				'description'		=> '',
				'section'			=> 'social',
				'settings'			=> 'social_facebook',
				'type'				=> 'url',
				'input_attrs' 		=> array(
					'placeholder'	=> __( 'http://', 'worx' ),
				),

			) );

			// Github
			$wp_customize->add_setting( 'social_github', array(

				'default'			=> '',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'worx_sanitize_url',

			) );

			$wp_customize->add_control( 'social_github', array(

				'label'				=> __( 'Github', 'worx' ),
				'description'		=> '',
				'section'			=> 'social',
				'settings'			=> 'social_github',
				'type'				=> 'url',
				'input_attrs' 		=> array(
					'placeholder'	=> __( 'http://', 'worx' ),
				),

			) );

			// Google+
			$wp_customize->add_setting( 'social_google', array(

				'default'			=> '',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'worx_sanitize_url',

			) );

			$wp_customize->add_control( 'social_google', array(

				'label'				=> __( 'Google+', 'worx' ),
				'description'		=> '',
				'section'			=> 'social',
				'settings'			=> 'social_google',
				'type'				=> 'url',
				'input_attrs' 		=> array(
					'placeholder'	=> __( 'http://', 'worx' ),
				),

			) );

			// Instagram
			$wp_customize->add_setting( 'social_instagram', array(

				'default'			=> '',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'worx_sanitize_url',

			) );

			$wp_customize->add_control( 'social_instagram', array(

				'label'				=> __( 'Instagram', 'worx' ),
				'description'		=> '',
				'section'			=> 'social',
				'settings'			=> 'social_instagram',
				'type'				=> 'url',
				'input_attrs' 		=> array(
					'placeholder'	=> __( 'http://', 'worx' ),
				),

			) );

			// LinkedIN
			$wp_customize->add_setting( 'social_linkedin', array(

				'default'			=> '',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'worx_sanitize_url',

			) );

			$wp_customize->add_control( 'social_linkedin', array(

				'label'				=> __( 'LinkedIN', 'worx' ),
				'description'		=> '',
				'section'			=> 'social',
				'settings'			=> 'social_linkedin',
				'type'				=> 'url',
				'input_attrs' 		=> array(
					'placeholder'	=> __( 'http://', 'worx' ),
				),

			) );

			// Pinterest
			$wp_customize->add_setting( 'social_pinterest', array(

				'default'			=> '',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'worx_sanitize_url',

			) );

			$wp_customize->add_control( 'social_pinterest', array(

				'label'				=> __( 'Pinterest', 'worx' ),
				'description'		=> '',
				'section'			=> 'social',
				'settings'			=> 'social_pinterest',
				'type'				=> 'url',
				'input_attrs' 		=> array(
					'placeholder'	=> __( 'http://', 'worx' ),
				),

			) );

			// Twitter
			$wp_customize->add_setting( 'social_twitter', array(

				'default'			=> '',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'worx_sanitize_url',

			) );

			$wp_customize->add_control( 'social_twitter', array(

				'label'				=> __( 'Twitter', 'worx' ),
				'description'		=> '',
				'section'			=> 'social',
				'settings'			=> 'social_twitter',
				'type'				=> 'url',
				'input_attrs' 		=> array(
					'placeholder'	=> __( 'http://', 'worx' ),
				),

			) );

			// Vimeo
			$wp_customize->add_setting( 'social_vimeo', array(

				'default'			=> '',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'worx_sanitize_url',

			) );

			$wp_customize->add_control( 'social_vimeo', array(

				'label'				=> __( 'Vimeo', 'worx' ),
				'description'		=> '',
				'section'			=> 'social',
				'settings'			=> 'social_vimeo',
				'type'				=> 'url',
				'input_attrs' 		=> array(
					'placeholder'	=> __( 'http://', 'worx' ),
				),

			) );

			// YouTube
			$wp_customize->add_setting( 'social_youtube', array(

				'default'			=> '',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'worx_sanitize_url',

			) );

			$wp_customize->add_control( 'social_youtube', array(

				'label'				=> __( 'YouTube', 'worx' ),
				'description'		=> '',
				'section'			=> 'social',
				'settings'			=> 'social_youtube',
				'type'				=> 'url',
				'input_attrs' 		=> array(
					'placeholder'	=> __( 'http://', 'worx' ),
				),

			) );

		//endif; // END TVA_Social




		//if( class_exists( 'TVA_Share' ) ) :

		// Social Settings
		$wp_customize->add_section( 'share', array(
	
			'title'				=> esc_html__( 'Social Share Settings', 'worx' ),
			'description'		=> __( 'Add a nice tool to share your posts.', 'worx' ),
			'priority'			=> 310,
			'active_callback'	=> 'worx_share',

		) );

			// Social
			$wp_customize->add_setting( 'enable_share', array(

				'default'			=> true,
				'sanitize_callback' => 'worx_sanitize_checkbox',

			) );

			$wp_customize->add_control( 'enable_share', array(

				'label'				=> __( 'Enable social sharing', 'worx' ),
				'description'		=> '',
				'section'			=> 'share',
				'settings'			=> 'enable_share',
				'type'				=> 'checkbox',

			) );

			// Twitter
			$wp_customize->add_setting( 'share_twitter', array(

				'default'			=> true,
				'sanitize_callback' => 'worx_sanitize_checkbox',

			) );

			$wp_customize->add_control( 'share_twitter', array(

				'label'				=> __( 'Enable Twitter', 'worx' ),
				'description'		=> '',
				'section'			=> 'share',
				'settings'			=> 'share_twitter',
				'type'				=> 'checkbox',

			) );

			// Facebook
			$wp_customize->add_setting( 'share_facebook', array(

				'default'			=> true,
				'sanitize_callback' => 'worx_sanitize_checkbox',

			) );

			$wp_customize->add_control( 'share_facebook', array(

				'label'				=> __( 'Enable Facebook', 'worx' ),
				'description'		=> '',
				'section'			=> 'share',
				'settings'			=> 'share_facebook',
				'type'				=> 'checkbox',

			) );

			// Google
			$wp_customize->add_setting( 'share_google', array(

				'default'			=> true,
				'sanitize_callback' => 'worx_sanitize_checkbox',

			) );

			$wp_customize->add_control( 'share_google', array(

				'label'				=> __( 'Enable Google', 'worx' ),
				'description'		=> '',
				'section'			=> 'share',
				'settings'			=> 'share_google',
				'type'				=> 'checkbox',

			) );

			// LinkedIN
			$wp_customize->add_setting( 'share_linkedin', array(

				'default'			=> true,
				'sanitize_callback' => 'worx_sanitize_checkbox',

			) );

			$wp_customize->add_control( 'share_linkedin', array(

				'label'				=> __( 'Enable LinkedIN', 'worx' ),
				'description'		=> '',
				'section'			=> 'share',
				'settings'			=> 'share_linkedin',
				'type'				=> 'checkbox',

			) );

			// Pinterest
			$wp_customize->add_setting( 'share_pinterest', array(

				'default'			=> true,
				'sanitize_callback' => 'worx_sanitize_checkbox',

			) );

			$wp_customize->add_control( 'share_pinterest', array(

				'label'				=> __( 'Enable Pinterest', 'worx' ),
				'description'		=> '',
				'section'			=> 'share',
				'settings'			=> 'share_pinterest',
				'type'				=> 'checkbox',

			) );

		//endif; // END TVA_Share




		// Custom contextual controls
		function worx_share() {

			return class_exists( 'TVA_Share' );
			
		}

		function worx_social() {

			return class_exists( 'TVA_Social' );
			
		}

		function worx_homepage() {
		
			return is_page_template( 'template-homepage.php' );
		
		}
		
		function worx_portfolio() {
		
			return is_page_template( 'template-projects.php' );
		
		}
		
		function worx_team() {
		
			return is_page_template( 'template-team.php' );
		
		}
		
		function worx_testimonials() {
		
			return is_page_template( 'template-testimonials.php' );
		
		}


		// Sanitize text
		function worx_sanitize_text( $input ) {

			return wp_kses_allowed_html( force_balance_tags( $input ) );

		}

		// Sanitize number
		function worx_sanitize_number( $input ) {

			return esc_attr( force_balance_tags( $input ) );

		}

		// Sanitize textarea
		function worx_sanitize_textarea( $content ) {

			if ( '' === $content ) {

				return '';

			}
	
			return wp_kses( $content, wp_kses_allowed_html( 'post' ) );

		}

		// Sanitize URL
		function worx_sanitize_url( $input ) {

			return esc_url( force_balance_tags( $input ) );

		}

		// Sanitize checkbox
		function worx_sanitize_checkbox( $input ) {

			if( $input == 1 ) {

				return 1;

			} else {

				return '';

			}

		}

		// Sanitize select
		function worx_sanitize_select( $input, $setting ) {

			global $wp_customize;

			$control = $wp_customize->get_control( $setting->id );

			if( array_key_exists( $input, $control->choices ) ) {

				return $input;

			} else {

				return $setting->default;

			}

		}

	}


	/**
	* This will output the custom WordPress settings to the live theme's WP head.
	* 
	* Used by hook: 'wp_head'
	*/

	public static function header_output( $wp_customize ) {

	?>

		<style type="text/css">

			<?php // CSS

			// Accent
			if( get_theme_mod( 'accent' ) != $GLOBALS['accent'] ) {

				// Background
				self::generate_css( '.button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .button:focus, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus, table caption, .post-navigation .nav-previous .post-title, .post-navigation .nav-next .post-title, .comment-navigation .nav-previous .post-title, .comment-navigation .nav-next .post-title, .image-navigation .nav-previous .post-title, .image-navigation .nav-next .post-title, .posts-navigation .nav-previous .post-title, .posts-navigation .nav-next .post-title, .sidebar-toggle:hover, .viewer .close:hover', 'background-color', 'accent' );

				// Color
				self::generate_css( 'a:hover, a:focus, a:active, .widget_tva_icon_text_widget .fa, .site-branding .site-title a:hover, .main-navigation a:hover, .main-navigation .current-menu-item > a, .clone .main-navigation .trigger-menu-wrap .trigger-menu.active, .hero-area a:hover, .entry-header .entry-title a:hover, .entry-content a:hover, .entry-summary a:hover, .entry-footer a:hover, .post-navigation a:hover, .comment-navigation a:hover, .image-navigation a:hover, .pagination a:hover, .posts-navigation a:hover, .secondary a:hover, .comment-metadata a:hover, .pingback .edit-link a:hover, .required, .site-subfooter a:hover, .site-footer a:hover, .site-info .trigger-subfooter-wrap .trigger-subfooter.active, .tva_share .trigger-share-panel.active', 'color', 'accent' );

				// Border
				self::generate_css( 'thead tr, input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, select:focus, textarea:focus, .clone .main-navigation .trigger-menu-wrap .trigger-menu, .entry-content a, .entry-summary a, .entry-footer a, .comment-list .reply a, .site-footer a', 'border-color', 'accent' );

			}


			// ------------------------------------------------------------


			// Footer background
			if( get_theme_mod( 'footer_background' ) != $GLOBALS['footer_background'] ) {

				self::generate_css( '.site-footer', 'background-color', 'footer_background' );

			}


			// ------------------------------------------------------------


			// Site title
			if( get_theme_mod( 'site_title_link' ) != $GLOBALS['site_title_link'] ) {

				self::generate_css( '.site-branding .site-title, .site-branding .site-title a', 'color', 'site_title_link' );

			}

			// Tagline
			if( get_theme_mod( 'tagline_text' ) != $GLOBALS['tagline_text'] ) {

				self::generate_css( '.site-branding .site-description', 'color', 'tagline_text' );

			}


			// Primary navigation link
			if( get_theme_mod( 'primary_navigation_link' ) != $GLOBALS['primary_navigation_link'] ) {

				self::generate_css( '.main-navigation, .main-navigation a', 'color', 'primary_navigation_link' );

			}


			// Primary text
			if( get_theme_mod( 'primary_text' ) != $GLOBALS['primary_text'] ) {

				self::generate_css( 'body, input, select, textarea, label', 'color', 'primary_text' );

			}

			// Primary link
			if( get_theme_mod( 'primary_link' ) != $GLOBALS['primary_link'] ) {

				self::generate_css( 'a, .entry-content a, .entry-summary a', 'color', 'primary_link' );

			}


			// Primary headings
			if( get_theme_mod( 'primary_headings' ) != $GLOBALS['primary_headings'] ) {

				self::generate_css( 'h1, h2, h3, h4, h5, h6, .entry-header .entry-title, .entry-header .entry-title a, .page-header .page-title, .page-header .page-title a', 'color', 'primary_headings' );

			}

			// Secondary headings
			if( get_theme_mod( 'secondary_headings' ) != $GLOBALS['secondary_headings'] ) {

				self::generate_css( '.secondary .widget-area .widget .widget-title', 'color', 'secondary_headings' );

			}

			// Footer headings
			if( get_theme_mod( 'footer_headings' ) != $GLOBALS['footer_headings'] ) {

				self::generate_css( '.site-subfooter .widget-area .widget .widget-title', 'color', 'footer_headings' );

			}


			// Meta text
			if( get_theme_mod( 'meta_text' ) != $GLOBALS['meta_text'] ) {

				self::generate_css( '.entry-footer, .comment-metadata, .pingback .edit-link', 'color', 'meta_text' );

			}

			// Meta link
			if( get_theme_mod( 'meta_link' ) != $GLOBALS['meta_link'] ) {

				self::generate_css( '.entry-footer a, .comment-metadata a, .pingback .edit-link a', 'color', 'meta_link' );

			}


			// Secondary text
			if( get_theme_mod( 'secondary_text' ) != $GLOBALS['secondary_text'] ) {

				self::generate_css( '.secondary', 'color', 'secondary_text' );

			}

			// Secondary link
			if( get_theme_mod( 'secondary_link' ) != $GLOBALS['secondary_link'] ) {

				self::generate_css( '.secondary a', 'color', 'secondary_link' );

			}


			// Page navigation text
			/*if( get_theme_mod( 'page_navigation_text' ) != $GLOBALS['page_navigation_text'] ) {

				self::generate_css( '.post-navigation, .comment-navigation, .image-navigation, .pagination, .posts-navigation', 'color', 'page_navigation_text' );

			}*/

			// Page navigation link
			/*if( get_theme_mod( 'page_navigation_link' ) != $GLOBALS['page_navigation_link'] ) {

				self::generate_css( '.post-navigation a, .comment-navigation a, .image-navigation a, .pagination a, .posts-navigation a', 'color', 'page_navigation_link' );

			}*/


			// Subfooter text
			/*if( get_theme_mod( 'subfooter_text' ) != $GLOBALS['subfooter_text'] ) {

				self::generate_css( '.site-subfooter', 'color', 'subfooter_text' );

			}

			// Subfooter link
			if( get_theme_mod( 'subfooter_link' ) != $GLOBALS['subfooter_link'] ) {

				self::generate_css( '.site-subfooter a', 'color', 'subfooter_link' );

			}*/


			// Footer text
			if( get_theme_mod( 'footer_text' ) != $GLOBALS['footer_text'] ) {

				self::generate_css( '.site-footer, .site-subfooter', 'color', 'footer_text' );

			}

			// Footer link
			if( get_theme_mod( 'footer_link' ) != $GLOBALS['footer_link'] ) {

				self::generate_css( '.site-footer a, .site-subfooter a', 'color', 'footer_link' );

			}

			// Footer link
			if( get_theme_mod( 'footer_link' ) != $GLOBALS['footer_link'] ) {

				self::generate_css( '.site-footer a:hover', 'border-color', 'footer_link' );

			}


			if( get_theme_mod( 'custom_css' ) ) {

				echo wp_kses_post( get_theme_mod( 'custom_css' ) );

			}

		?>

		</style>

	<?php echo "\n";

	}




   /**
    * This outputs the javascript needed to automate the live settings preview.
    * Also keep in mind that this function isn't necessary unless your settings 
    * are using 'transport'=>'postMessage' instead of the default 'transport'
    * => 'refresh'
    * 
    * Used by hook: 'customize_preview_init'
    */

	public static function customize_preview_js() {

		wp_enqueue_script( 'worx_Customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '1.0', true );

	}



	/**
	* This will generate a line of CSS for use in header output. If the setting
	* ($mod_name) has no defined value, the CSS will not be output.
	* 
	* @uses get_theme_mod()
	* @param string $selector CSS selector
	* @param string $style The name of the CSS *property* to modify
	* @param string $mod_name The name of the 'theme_mod' option to fetch
	* @param string $prefix Optional. Anything that needs to be output before the CSS property
	* @param string $postfix Optional. Anything that needs to be output after the CSS property
	* @param bool $echo Optional. Whether to print directly to the page (default: true).
	* @return string Returns a single line of CSS with selectors and a property.
	*/
	
	public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {

		$return = '';
		$mod = get_theme_mod( $mod_name );

		$color = $mod;

		if( ! empty( $mod ) ) {
	
			$return = sprintf( '%s { %s: %s; }', $selector, $style, $prefix.$color.$postfix );

			if( $echo ) {

				echo $return;

			}

		}

		return $return;

	}

}

// Setup the Customizer settings and controls
add_action( 'customize_register' , array( 'worx_Customize' , 'customize_register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'worx_Customize' , 'header_output' ) );

// Binds JS handlers to make Customizer preview reload changes asynchronously
add_action( 'customize_preview_init', array( 'worx_Customize' , 'customize_preview_js' ) );

