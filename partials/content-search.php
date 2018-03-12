<?php
/**
 * The default template for search content.
 *
 * @package Worx
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-content post-content--search">
        <?php if (has_post_thumbnail()): ?>
            <figure class="entry-figure">
                <a href="<?php the_permalink() ?> " rel="bookmark"><?php the_post_thumbnail('thumbnail') ?></a>
            </figure>
        <?php endif ?>
		<header class="entry-header">


			<h2 class="entry-title"><a href="<?php the_permalink() ?> " rel="bookmark"><?php the_title() ?></a></h2>
            <?php $years = get_the_terms($post->ID,'portfolio_date'); ?>
              <p class="entry-subtitle">
                <?php foreach ($years as $year) : ?>
                  <span class="tyear"><?= $year->name; ?></span>
                <?php endforeach; ?>
              </p>



		</header><!-- END .entry-header -->

		<div class="entry-summary">

			<?php the_excerpt(); ?>
            <a href="<?php the_permalink() ?>" class="readmore"><?php _e('Details','v2g') ?></a>

		</div><!-- END .entry-summary -->

	</div><!-- END .post-content -->

</article><!-- END #post-<?php the_ID(); ?> -->
