<aside class="thesearchpanel">
    <div class="center-content">
        <?php get_search_form(); ?>
        <hr>
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
