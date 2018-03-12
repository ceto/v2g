<?php
/**
 * The default template for portfolio content.
 *
 * @package Worx
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // Link

	$url = get_field( '_project_url' );
	$external = get_field( '_project_url_external', false );

	if( $external ) {

		$link = $url;

	} else {

		$link = get_permalink();

	} ?>

	<a class="post-thumbnail" href="<?php echo esc_url( $link ); ?>" title="<?php the_title(); ?>" rel="bookmark">

		<?php // Media

		$origid = apply_filters( 'wpml_object_id', get_the_ID(), 'portfolio_project', FALSE, 'hu' );
		echo get_the_post_thumbnail( $origid, 'thumbnail' ); ?>

		<div class="post-overlay"><!-- .post-content -->

			<div class="entry-overlay"><!-- .entry-content -->

				<header class="entry-header">

					<?php // Entry title
					the_title( '<h2 class="entry-title">', '</h2>' ); ?>
          <?php $years = get_the_terms($post->ID,'portfolio_date'); ?>
          <p class="entry-subtitle">
            <?php foreach ($years as $year) : ?>
              <span class="tyear"><?= $year->name; ?></span>
            <?php endforeach; ?>
          </p>

					<?php // Subtitle

					$enable_subtitle = get_theme_mod( 'enable_subtitle', false );

					if( function_exists( 'the_subtitle' ) && $enable_subtitle ) {

						the_subtitle( '<p class="entry-subtitle">', '</p>' );

					} ?>

				</header><!-- END .entry-header -->

			</div><!-- END .overlay-content -->

		</div><!-- END .entry-overlay -->

	</a><!-- END .post-thumbnail -->

</article><!-- END #post-<?php the_ID(); ?> -->
