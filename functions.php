<?php
/**
 * Child-theme functions and definitions
 *
 * @package Worx
 */

define('ICL_DONT_LOAD_NAVIGATION_CSS', TRUE);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', TRUE);
define('ICL_DONT_LOAD_LANGUAGES_JS', TRUE);


remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );



# Deregister style files
function cement_DequeueYarppStyle()
{
  wp_dequeue_style('yarppRelatedCss');
  wp_deregister_style('yarppRelatedCss');
}
add_action('wp_footer', 'cement_DequeueYarppStyle');


function v2g_theme_setup() {
  //add_image_size( 'port-thumb', 640, 360, true );
  //add_image_size( 'port-large', 1560, 9999, false );
  register_nav_menu( 'contact', __( 'Contact', 'worx' ) );
}

add_action( 'after_setup_theme', 'v2g_theme_setup' );



/**
 * Load child theme stylesheet
 */

add_action( 'wp_print_styles', 'theme_enqueue_styles', 1000 );

function theme_enqueue_styles() {

  // Enqueue
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'parent-flickity', get_template_directory_uri() . '/css/flickity.min.css' );

  wp_enqueue_style( 'parent-ionicons', get_template_directory_uri() . '/css/ionicons.min.css');
  wp_enqueue_style( 'parent-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css');
  wp_enqueue_style( 'v2g-style', get_stylesheet_directory_uri() . '/dist/css/style.css' );

  // Deregister
  wp_deregister_style( 'flickity' );
  wp_deregister_style( 'ionicons' );
  wp_deregister_style( 'fancybox' );
  wp_deregister_style( 'style' );

  wp_deregister_script( 'retina' );


}


add_action( 'init', 'v2g_custom_portfolio_taxonomies_date' );
add_action( 'init', 'v2g_custom_portfolio_taxonomies_state' );
add_action( 'init', 'v2g_custom_portfolio_taxonomies_type' );
add_action( 'init', 'v2g_custom_portfolio_taxonomies_feature' );




  function v2g_custom_portfolio_taxonomies_date() {

    // Capabilities
    $capabilities = array(

      'manage_terms' => 'manage_portfolio_project',
      'edit_terms'   => 'manage_portfolio_project',
      'delete_terms' => 'manage_portfolio_project',
      'assign_terms' => 'edit_portfolio_project'

    );

    // Rewrite
    $rewrite = array(

      'slug'      => 'portfolio_date',
      'with_front'  => false,
      'hierarchical'  => true,
      'ep_mask'   => EP_NONE

    );

    // Labels
    $labels = array(

      'name'                       => __( 'Project Dates', 'v2g' ),
      'singular_name'              => __( 'Project Date', 'v2g' ),
      'menu_name'                  => __( 'Dates', 'v2g' ),
      'name_admin_bar'             => __( 'Date', 'v2g' ),
      'search_items'               => __( 'Search Dates', 'v2g' ),
      'popular_items'              => __( 'Popular Dates', 'v2g' ),
      'all_items'                  => __( 'All Dates', 'v2g' ),
      'edit_item'                  => __( 'Edit Date', 'v2g' ),
      'view_item'                  => __( 'View Date', 'v2g' ),
      'update_item'                => __( 'Update Date', 'v2g' ),
      'add_new_item'               => __( 'Add New Date', 'v2g' ),
      'new_item_name'              => __( 'New Date Name', 'v2g' ),
      'parent_item'                => __( 'Parent Date', 'v2g' ),
      'parent_item_colon'          => __( 'Parent Date:', 'v2g' ),
      'separate_items_with_commas' => null,
      'add_or_remove_items'        => null,
      'choose_from_most_used'      => null,
      'not_found'                  => null,

    );

    // Args
    $args = array(

      'public'      => true,
      'show_ui'     => true,
      'show_in_nav_menus' => true,
      'show_tagcloud'   => true,
      'show_admin_column' => true,
      'hierarchical'    => false,
      'query_var'     => 'portfolio_date',
      //'capabilities'    => $capabilities,
      'rewrite'     => $rewrite,
      'labels'      => $labels,

    );

    register_taxonomy( 'portfolio_date', 'portfolio_project', $args );

  }


  function v2g_custom_portfolio_taxonomies_state() {

    // Capabilities
    $capabilities = array(

      'manage_terms' => 'manage_portfolio_project',
      'edit_terms'   => 'manage_portfolio_project',
      'delete_terms' => 'manage_portfolio_project',
      'assign_terms' => 'edit_portfolio_project'

    );

    // Rewrite
    $rewrite = array(

      'slug'      => 'portfolio_state',
      'with_front'  => false,
      'hierarchical'  => true,
      'ep_mask'   => EP_NONE

    );

    // Labels
    $labels = array(

      'name'                       => __( 'Project States', 'v2g' ),
      'singular_name'              => __( 'Project State', 'v2g' ),
      'menu_name'                  => __( 'States', 'v2g' ),
      'name_admin_bar'             => __( 'State', 'v2g' ),
      'search_items'               => __( 'Search States', 'v2g' ),
      'popular_items'              => __( 'Popular States', 'v2g' ),
      'all_items'                  => __( 'All States', 'v2g' ),
      'edit_item'                  => __( 'Edit State', 'v2g' ),
      'view_item'                  => __( 'View State', 'v2g' ),
      'update_item'                => __( 'Update State', 'v2g' ),
      'add_new_item'               => __( 'Add New State', 'v2g' ),
      'new_item_name'              => __( 'New State Name', 'v2g' ),
      'parent_item'                => __( 'Parent State', 'v2g' ),
      'parent_item_colon'          => __( 'Parent State:', 'v2g' ),
      'separate_items_with_commas' => null,
      'add_or_remove_items'        => null,
      'choose_from_most_used'      => null,
      'not_found'                  => null,

    );

    // Args
    $args = array(

      'public'      => true,
      'show_ui'     => true,
      'show_in_nav_menus' => true,
      'show_tagcloud'   => true,
      'show_admin_column' => true,
      'hierarchical'    => true,
      'query_var'     => 'portfolio_state',
      //'capabilities'    => $capabilities,
      'rewrite'     => $rewrite,
      'labels'      => $labels,

    );

    register_taxonomy( 'portfolio_state', 'portfolio_project', $args );

  }



  function v2g_custom_portfolio_taxonomies_type() {

    // Capabilities
    $capabilities = array(

      'manage_terms' => 'manage_portfolio_project',
      'edit_terms'   => 'manage_portfolio_project',
      'delete_terms' => 'manage_portfolio_project',
      'assign_terms' => 'edit_portfolio_project'

    );

    // Rewrite
    $rewrite = array(

      'slug'      => 'portfolio_type',
      'with_front'  => false,
      'hierarchical'  => true,
      'ep_mask'   => EP_NONE

    );

    // Labels
    $labels = array(

      'name'                       => __( 'Project Types', 'v2g' ),
      'singular_name'              => __( 'Project Type', 'v2g' ),
      'menu_name'                  => __( 'Types', 'v2g' ),
      'name_admin_bar'             => __( 'Type', 'v2g' ),
      'search_items'               => __( 'Search Types', 'v2g' ),
      'popular_items'              => __( 'Popular Types', 'v2g' ),
      'all_items'                  => __( 'All Types', 'v2g' ),
      'edit_item'                  => __( 'Edit Type', 'v2g' ),
      'view_item'                  => __( 'View Type', 'v2g' ),
      'update_item'                => __( 'Update Type', 'v2g' ),
      'add_new_item'               => __( 'Add New Type', 'v2g' ),
      'new_item_name'              => __( 'New Type Name', 'v2g' ),
      'parent_item'                => __( 'Parent Type', 'v2g' ),
      'parent_item_colon'          => __( 'Parent Type:', 'v2g' ),
      'separate_items_with_commas' => null,
      'add_or_remove_items'        => null,
      'choose_from_most_used'      => null,
      'not_found'                  => null,

    );

    // Args
    $args = array(

      'public'      => true,
      'show_ui'     => true,
      'show_in_nav_menus' => true,
      'show_tagcloud'   => true,
      'show_admin_column' => true,
      'hierarchical'    => true,
      'query_var'     => 'portfolio_type',
      //'capabilities'    => $capabilities,
      'rewrite'     => $rewrite,
      'labels'      => $labels,

    );

    register_taxonomy( 'portfolio_type', 'portfolio_project', $args );

  }

  function v2g_custom_portfolio_taxonomies_feature() {

    // Capabilities
    $capabilities = array(

      'manage_terms' => 'manage_portfolio_project',
      'edit_terms'   => 'manage_portfolio_project',
      'delete_terms' => 'manage_portfolio_project',
      'assign_terms' => 'edit_portfolio_project'

    );

    // Rewrite
    $rewrite = array(

      'slug'      => 'portfolio_feature',
      'with_front'  => false,
      'hierarchical'  => true,
      'ep_mask'   => EP_NONE

    );

    // Labels
    $labels = array(

      'name'                       => __( 'Project Features', 'v2g' ),
      'singular_name'              => __( 'Project Feature', 'v2g' ),
      'menu_name'                  => __( 'Features', 'v2g' ),
      'name_admin_bar'             => __( 'Feature', 'v2g' ),
      'search_items'               => __( 'Search Features', 'v2g' ),
      'popular_items'              => __( 'Popular Features', 'v2g' ),
      'all_items'                  => __( 'All Features', 'v2g' ),
      'edit_item'                  => __( 'Edit Feature', 'v2g' ),
      'view_item'                  => __( 'View Feature', 'v2g' ),
      'update_item'                => __( 'Update Feature', 'v2g' ),
      'add_new_item'               => __( 'Add New Feature', 'v2g' ),
      'new_item_name'              => __( 'New Feature Name', 'v2g' ),
      'parent_item'                => __( 'Parent Feature', 'v2g' ),
      'parent_item_colon'          => __( 'Parent Feature:', 'v2g' ),
      'separate_items_with_commas' => null,
      'add_or_remove_items'        => null,
      'choose_from_most_used'      => null,
      'not_found'                  => null,

    );

    // Args
    $args = array(

      'public'      => true,
      'show_ui'     => true,
      'show_in_nav_menus' => true,
      'show_tagcloud'   => true,
      'show_admin_column' => true,
      'hierarchical'    => true,
      'query_var'     => 'portfolio_feature',
      //'capabilities'    => $capabilities,
      'rewrite'     => $rewrite,
      'labels'      => $labels,

    );

    register_taxonomy( 'portfolio_feature', 'portfolio_project', $args );

  }



function worx_portfolio_meta( $date, $client, $location, $categories, $tags, $url ) {

    if( class_exists( 'ACF' ) ) :

    if( ( is_sticky() && is_home() && ! is_paged() ) ) {

      printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'worx' ) );

    }

    // Date
    if( $date ) {
      worx_project_date();
    }

    // Client
    if( $client ) {
      worx_project_client();
    }

    // Location
    if( $location ) {
      worx_project_location();
    }

    // Categories
    if( $categories ) {
      worx_portfolio_categories();
    }

    worx_portfolio_dates();
    worx_portfolio_types();
    worx_portfolio_states();
    worx_portfolio_features();


    // Tags
    if( $tags ) {
      worx_portfolio_tags();
    }

    // URL
    if( $url ) {
      worx_project_url();
    }

    endif;

  }

function worx_portfolio_dates() {

    $categories_list = get_the_term_list( '', 'portfolio_date', '', '-', '' );

    if( $categories_list ) {

      printf( '<span class="meta-item date-links"><span class="meta-label">%1$s</span> %2$s</span>',
        esc_html_x( 'Date: ', 'Used before category names.', 'worx' ),
        $categories_list
      );

    }

  }

function worx_portfolio_types() {

    $categories_list = get_the_term_list( '', 'portfolio_type', '', ', ', '' );

    if( $categories_list ) {

      printf( '<span class="meta-item type-links"><span class="meta-label">%1$s</span> %2$s</span>',
        esc_html_x( 'Type: ', 'Used before category names.', 'worx' ),
        $categories_list
      );

    }

  }

  function worx_portfolio_states() {

    $categories_list = get_the_term_list( '', 'portfolio_state', '', ', ', '' );

    if( $categories_list ) {

      printf( '<span class="meta-item state-links"><span class="meta-label">%1$s</span> %2$s</span>',
        esc_html_x( 'State: ', 'Used before category names.', 'worx' ),
        $categories_list
      );

    }

  }

    function worx_portfolio_features() {

    $categories_list = get_the_term_list( '', 'portfolio_feature', '', ', ', '' );

    if( $categories_list ) {

      printf( '<span class="meta-item feature-links"><span class="meta-label">%1$s</span> %2$s</span>',
        esc_html_x( 'Feature: ', 'Used before category names.', 'worx' ),
        $categories_list
      );

    }

  }


  // function v2g_custom_portfolio_taxonomies_tag() {

  //   // Capabilities
  //   $capabilities = array(

  //     'manage_terms' => 'manage_portfolio_project',
  //     'edit_terms'   => 'manage_portfolio_project',
  //     'delete_terms' => 'manage_portfolio_project',
  //     'assign_terms' => 'edit_portfolio_project'

  //   );

  //   // Rewrite
  //   $rewrite = array(

  //     'slug'      => 'portfolio_tag',
  //     'with_front'  => false,
  //     'hierarchical'  => false,
  //     'ep_mask'   => EP_NONE

  //   );

  //   // Labels
  //   $labels = array(

  //     'name'                       => __( 'Project Tags', 'tva' ),
  //     'singular_name'              => __( 'Project Tag', 'tva' ),
  //     'menu_name'                  => __( 'Tags', 'tva' ),
  //     'name_admin_bar'             => __( 'Tag', 'tva' ),
  //     'search_items'               => __( 'Search Tags', 'tva' ),
  //     'popular_items'              => __( 'Popular Tags', 'tva' ),
  //     'all_items'                  => __( 'All Tags', 'tva' ),
  //     'edit_item'                  => __( 'Edit Tag', 'tva' ),
  //     'view_item'                  => __( 'View Tag', 'tva' ),
  //     'update_item'                => __( 'Update Tag', 'tva' ),
  //     'add_new_item'               => __( 'Add New Tag', 'tva' ),
  //     'new_item_name'              => __( 'New Tag Name', 'tva' ),
  //     'separate_items_with_commas' => __( 'Separate tags with commas', 'tva' ),
  //     'add_or_remove_items'        => __( 'Add or remove tags', 'tva' ),
  //     'choose_from_most_used'      => __( 'Choose from the most used tags', 'tva' ),
  //     'not_found'                  => __( 'No tags found', 'tva' ),
  //     'parent_item'                => null,
  //     'parent_item_colon'          => null,

  //   );

  //   // Args
  //   $args = array(

  //     'public'      => true,
  //     'show_ui'     => true,
  //     'show_in_nav_menus' => true,
  //     'show_tagcloud'   => true,
  //     'show_admin_column' => true,
  //     'hierarchical'    => false,
  //     'query_var'     => 'portfolio_tag',
  //     //'capabilities'    => $capabilities,
  //     'rewrite'     => $rewrite,
  //     'labels'      => $labels,

  //   );

  //   register_taxonomy( 'portfolio_tag', 'portfolio_project', $args );

  // }


// function ceto_scripts() {
//   if (is_page_template('template-contact.php' )) {
//   wp_register_script( 'cetocontactform', get_stylesheet_directory_uri() . '/js/contact-form.js', array(), '1.0.0', true );
//   wp_enqueue_script( 'cetocontacform' );
//   }
// }
// add_action( 'wp_enqueue_scripts', 'ceto_scripts' );



function ceto_contact_footer() {
  if (is_page_template('template-contact.php' )) {
    echo '<script type="text/javascript" src="'.get_stylesheet_directory_uri().'/js/contact-form.js?ver=1.0.0"></script>';
    echo "\r\n";
  }

}

add_action( 'wp_footer', 'ceto_contact_footer', 9999 );

function ceto_isotope() {
  if (is_archive() || is_page_template('template-projects.php' )) {
    echo '<script type="text/javascript" src="'.get_stylesheet_directory_uri().'/js/isotope.js?ver=1.0.0"></script>';
    echo "\r\n";
  }

}

add_action( 'wp_footer', 'ceto_isotope', 9999 );


function worx_fonts_url() {

  $fonts_url = '';
  $fonts     = array();
  $subsets   = 'latin,latin-ext';

  /* translators: If there are characters in your language that are not supported, translate to 'off'. Do not translate into your own language. */

  // Anonymous Pro
  // if( 'off' !== _x( 'on', 'Anonymous Pro font: on or off', 'worx' ) ) {
  //   $fonts[] = 'Anonymous Pro:400,400italic,700,700italic';
  // }

  // Roboto Mono
  //if( 'off' !== _x( 'on', 'Titilium Web font: on or off', 'worx' ) ) {
    $fonts[] = 'Titillium Web:400,300,600,700,200,400italic';
  //}

  /* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
  $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'worx' );

  if( 'cyrillic' == $subset ) {
    $subsets .= ',cyrillic,cyrillic-ext';
  } elseif ( 'greek' == $subset ) {
    $subsets .= ',greek,greek-ext';
  } elseif ( 'devanagari' == $subset ) {
    $subsets .= ',devanagari';
  } elseif ( 'vietnamese' == $subset ) {
    $subsets .= ',vietnamese';
  }

  if( $fonts ) {

    $fonts_url = add_query_arg( array(
      'family' => urlencode( implode( '|', $fonts ) ),
      'subset' => urlencode( $subsets ),
    ), '//fonts.googleapis.com/css' );

  }

  return $fonts_url;

}


  function worx_gallery( $post, $images, $ids ) {

    if( class_exists( 'ACF' ) ) :

    global $post;

    // Function
    if( $images ) { ?>

    <div class="post-media media-gallery columns-1">

      <?php echo do_shortcode( '[gallery ids="' . implode( ',', array_map( 'absint', $ids ) ) . '" columns="1" size="large" link="file"]' ); ?>

    </div><!-- END .post-media -->

    <?php }

    endif;

  }


function v2g_ajax_search_enqueues() {
  wp_enqueue_script( 'ajax-search', get_stylesheet_directory_uri() . '/js/ajax-search.js', array( 'jquery' ), '1.0.0', true );
  wp_localize_script( 'ajax-search', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
//add_action( 'wp_enqueue_scripts', 'v2g_ajax_search_enqueues' );

function v2g_search_enqueues() {
  wp_enqueue_script( 'searchpanel', get_stylesheet_directory_uri() . '/js/searchpanel.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'v2g_search_enqueues' );



function v2g_load_search_results() {
    $query = $_POST['query'];

    $args = array(
        'post_type' => 'portfolio_project',
        'post_status' => 'publish',
        's' => $query
    );
    $search = new WP_Query( $args );

    ob_start();

    if ( $search->have_posts() ) :

    ?>

    <?php
      while ( $search->have_posts() ) : $search->the_post();

        get_template_part( 'partials/content', 'search' );

      endwhile;
  else : ?>
    <p>No results found</p>
  <?php endif;

  $content = ob_get_clean();

  echo $content;
  die();

}

add_action( 'wp_ajax_load_search_results', 'v2g_load_search_results' );
add_action( 'wp_ajax_nopriv_load_search_results', 'v2g_load_search_results' );



function v2g_post_shared_attributes( array $shared_attributes, WP_Post $post ) {
    // Here we make sure we push the post's language data to Algolia.
    $shared_attributes['wpml'] = apply_filters( 'wpml_post_language_details', null,  $post->ID );

    return $shared_attributes;
}

// Push WPML data for both posts and searchable posts indices.
add_filter( 'algolia_post_shared_attributes', 'v2g_post_shared_attributes', 10, 2 );
add_filter( 'algolia_searchable_post_shared_attributes', 'v2g_post_shared_attributes', 10, 2 );


function v2g_posts_index_settings( array $settings ) {
    // We add the language code to the facets to be able to easily filter on it.
    $settings['attributesForFaceting'][] = 'wpml.language_code';

    return $settings;
}

add_filter( 'algolia_posts_index_settings', 'v2g_posts_index_settings' );
add_filter( 'algolia_searchable_posts_index_settings', 'v2g_posts_index_settings' );
