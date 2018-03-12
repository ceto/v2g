<?php
/**
 * The default template for displaying header content.
 *
 * @package Worx
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php esc_attr( bloginfo( 'charset' ) ); ?>" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=3.0, initial-scale=1.0, user-scalable=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php $favicon = ( get_theme_mod( 'favicon' ) ) ? esc_url( $favicon ) : get_template_directory_uri() . '/favicon.png'; echo $favicon; ?>" />
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-70893727-1', 'auto');
    ga('send', 'pageview');
  </script>
</head>

<body <?php body_class(); ?>>

<?php // Sidebar

get_sidebar(); ?>

<div id="page" class="hfeed site">

	<button class="sidebar-toggle <?php $class = ( is_active_sidebar( 'hidden-sidebar' ) ) ? 'show' : 'hide'; echo $class; ?>">
		<span class="screen-reader-text"><?php _e( 'Menu', 'worx' ); ?></span>
		<span></span>
	</button>

	<header id="masthead" class="site-header <?php $fixed = ( get_theme_mod( 'enable_fixed_header' ) ) ? 'is-fixed' : 'is-not-fixed' ; echo $fixed; ?>" role="banner">

		<div class="center-content">

		<div class="header-area">

			<div class="site-branding">

				<?php // Logo

				$logo = get_theme_mod( 'logo' );

				if( $logo ) { ?>
				<h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a></h1>
				<?php } else { ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php } ?>

				<?php // Description

				$enable_tagline = get_theme_mod( 'enable_tagline', true );

				if( $enable_tagline ) { ?>
				<h2 class="site-description"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></h2>
				<?php } ?>

			</div><!-- END .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e( 'Header Navigation', 'worx' ); ?>">

				<?php // Primary navigation

				wp_nav_menu( array(

					'theme_location'	=> 'primary',
					'container'			=> false,
					'fallback_cb'		=> 'wp_page_menu',

				) ); ?>

			</nav><!-- END .main-navigation -->

			<div class="site-byline">

				<?php // Byline

				$byline = get_theme_mod( 'header_byline' );
				$email = get_option( 'admin_email' );

				if( $byline ) {

					echo wp_kses_post( do_shortcode( $byline ) );

				} else {

					echo '<a href="mailto:' . $email . '">' . $email . '</a>';

				} ?>

			</div><!-- END .site-byline -->

		</div><!-- END .header-area -->

		<?php // Content

		if( is_active_sidebar( 'header' ) ) : ?>

		<div id="header-widgets" class="header-widgets-area">

			<div class="widget-area widget-columns-4 center-1">

				<?php dynamic_sidebar( 'header' ); ?>

			</div>

		</div><!-- END .header-widgets-area -->

		<?php endif; ?>

		</div>

	</header><!-- END .site-header -->


	<?php get_template_part('thesearchpanel'); ?>

	<div id="content" class="site-content">
