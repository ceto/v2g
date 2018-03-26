  <?php
    $port_cat_terms = get_terms( 'portfolio_category', array('hide_empty'=> 0, 'orderby'=>'slug','order'=>'ASC') );
    $akterm_id = term_exists( get_query_var( 'term' ) ) ;
    if (is_tax('portfolio_category')) {
      $akterm = get_term_by('id', $akterm_id,  'portfolio_category' );
      $subtitle = ' - '.$akterm->name;
    } elseif (is_tax('portfolio_tag')) {
      $akterm = get_term_by('id', $akterm_id,  'portfolio_tag' );
      $subtitle = ': #'.$akterm->name;
    } elseif (is_tax('portfolio_feature')) {
      $akterm = get_term_by('id', $akterm_id,  'portfolio_feature' );
      $subtitle = ' - '.$akterm->name;
    } elseif (is_tax('portfolio_state')) {
      $akterm = get_term_by('id', $akterm_id,  'portfolio_state' );
      $subtitle = ' - '.$akterm->name;
    } elseif (is_tax('portfolio_date')) {
      $akterm = get_term_by('id', $akterm_id,  'portfolio_date' );
      $subtitle = ' - '.$akterm->name;
    } elseif (is_tax('portfolio_type')) {
      $akterm = get_term_by('id', $akterm_id,  'portfolio_type' );
      $subtitle = ' - '.$akterm->name;
    } else {
      $subtitle ='';
    }

  ?>
<header class="mosaic-header">
  <h1 class="mosaic-title"><?php _e('Portfolio','v2g'); ?><?= $subtitle ?></h1>
  <nav class="nav-portcategory">
    <ul class="js-isotopefilter">
      <li class=""><a href="<?= get_the_permalink(get_option('page_on_front')); ?>#" data-filter="*"><?php _e('All','v2g') ?></a></li>
      <?php foreach ( $port_cat_terms as $portcat ) { ?>
        <li>
          <!-- <a href="<?php echo get_term_link( $portcat, 'product-category' ); ?>" data-filter=".portfolio_category-<?= $portcat->slug; ?>"> -->
          <a href="<?= get_the_permalink(get_option('page_on_front')).'#portfolio_category-'.$portcat->slug; ?>" class="<?php echo (($portcat->term_id==$akterm_id))?'active':''; ?>" data-filter=".portfolio_category-<?= $portcat->slug; ?>">
            <?php
              $teri = get_term($portcat, 'portfolio_category' );
              echo $teri->name;
            ?>
          </a>
        </li>
      <?php } ?>
    </ul>
  </nav>
  <?php get_template_part('thesearchpanel'); ?>
</header>