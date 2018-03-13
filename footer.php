<?php
/**
 * The default template for displaying footer content.
 *
 * @package Worx
 */
?>

	</div><!-- END #site-content -->
	<aside class="lightfooter">
	<div class="center-content">
	<section class="searchtags">
            <div class="searchtags__elem searchtags__elem--full">
                <?php $terms = get_terms( array('taxonomy' => 'portfolio_tag', 'orderby' => 'count', 'order' => 'DESC' ) ); ?>
                <h3><?= __( 'Project Tags', 'v2g' ) ?></h3>
                <ul class="termlist">
                    <?php foreach ($terms as $key => $term) :?>
                        <li class="termlist__item"><a href="<?= get_term_link($term, 'portfolio_tag') ?>"><?= $term->name ?> <span class="count">(<?= $term->count ?>)</span></a></li>
                    <?php endforeach; ?>

                </ul>
            </div>
            <div class="searchtags__elem">
                <?php $terms = get_terms( array('taxonomy' => 'portfolio_category', 'orderby' => 'count', 'order' => 'DESC' ) ); ?>
                <h3><?= __( 'Project Categories', 'v2g' ) ?></h3>
                <ul class="termlist">
                    <?php foreach ($terms as $key => $term) :?>
                        <li class="termlist__item"><a href="<?= get_term_link($term, 'portfolio_category') ?>"><?= $term->name ?> <span class="count">(<?= $term->count ?>)</span></a></li>
                    <?php endforeach; ?>

                </ul>
            </div>
            <div class="searchtags__elem">
                <?php $terms = get_terms( array('taxonomy' => 'portfolio_type', 'orderby' => 'count', 'order' => 'DESC' ) ); ?>
                <h3><?= __( 'Project Types', 'v2g' ) ?></h3>
                <ul class="termlist">
                    <?php foreach ($terms as $key => $term) :?>
                        <li class="termlist__item"><a href="<?= get_term_link($term, 'portfolio_type') ?>"><?= $term->name ?> <span class="count">(<?= $term->count ?>)</span></a></li>
                    <?php endforeach; ?>

                </ul>
            </div>
            <div class="searchtags__elem">
                <?php $terms = get_terms( array('taxonomy' => 'portfolio_feature', 'orderby' => 'count', 'order' => 'DESC' ) ); ?>
                <h3><?= __( 'Project Features', 'v2g' ) ?></h3>
                <ul class="termlist">
                    <?php foreach ($terms as $key => $term) :?>
                        <li class="termlist__item"><a href="<?= get_term_link($term, 'portfolio_feature') ?>"><?= $term->name ?> <span class="count">(<?= $term->count ?>)</span></a></li>
                    <?php endforeach; ?>

                </ul>
            </div>

            <div class="searchtags__elem">
                <?php $terms = get_terms( array('taxonomy' => 'portfolio_state', 'orderby' => 'count', 'order' => 'DESC' ) ); ?>
                <h3><?= __( 'Project States', 'v2g' ) ?></h3>
                <ul class="termlist">
                    <?php foreach ($terms as $key => $term) :?>
                        <li class="termlist__item"><a href="<?= get_term_link($term, 'portfolio_state') ?>"><?= $term->name ?> <span class="count">(<?= $term->count ?>)</span></a></li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </section>
     </div>
	</aside>
	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="center-content">

		<div class="site-info">

			<div class="copyright">

				<?php // Copyright

				$date = date( 'Y' );
				$title = get_bloginfo( 'name' );

				printf( __( '&copy; %1$s %2$s.', 'worx' ), esc_attr( $date ), esc_attr( $title ) ); ?>

			</div><!-- END .credit -->

			<?php // Byline

			$byline = get_theme_mod( 'footer_byline' );

			if( $byline ) : ?>

			<div class="credit">

				<?php echo wp_kses_post( do_shortcode( $byline ) ); ?>

			</div>

			<?php endif; ?>

			<?php // Subfooter

			if( is_active_sidebar( 'footer-1' ) ) : ?>

			<button class="trigger-subfooter">
				<span class="screen-reader-text"><?php _e( 'Expand', 'worx' ); ?></span>
				<!--<span></span>-->
				<i class="icon ion-plus open"></i>
				<i class="icon ion-minus close"></i>
			</button>

			<?php endif; ?>

		</div><!-- END .site-info -->

		</div>

	</footer><!-- END .site-footer -->

	<div id="subfooter" class="site-subfooter">

		<div class="center-content">

		<div class="subfooter-area">

			<?php // Subfooter

			if( is_active_sidebar( 'footer-1' ) ) : ?>

			<div class="widget-area <?php $active = ( is_active_sidebar( 'footer-1' ) && is_active_sidebar( 'footer-2' ) ) ? 'active-1-and-2' : 'active-1'; echo $active; ?>">

				<?php // Footer

				if( is_active_sidebar( 'footer-1' ) ) : ?>

				<div class="widget-area-1 widget-columns-4">

				<?php dynamic_sidebar( 'footer-1' ); ?>

				</div>

				<?php endif; ?>

				<?php // Footer

				if( is_active_sidebar( 'footer-2' ) ) : ?>

				<div class="widget-area-2 widget-columns-4">

				<?php dynamic_sidebar( 'footer-2' ); ?>

				</div>

				<?php endif; ?>

			</div><!-- END .widget-area -->

			<?php endif; ?>

		</div><!-- END .subfooter-area -->

		</div>

	</div><!-- END .site-subfooter -->

</div><!-- END .site -->

<div class="page-overlay"></div>

<?php wp_footer(); ?>

</body>
</html>