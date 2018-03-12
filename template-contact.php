<?php
/**
 * Template Name: Contact Template
 *
 * The template for displaying contact page with Map
 *
 * @package Worx
 */

get_header(); ?>


<div class="google-map" id="gmap">
</div>



    <!-- Google MAps -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>

      function initialize() {
        var mapOptions = {
          styles: [
            {
              "stylers": [
                { "saturation": -100 },
                { "gamma": 1.94 }
              ]
            }
          ],
          zoom: 14,
          mapTypeControl: true,
          mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
          },
          scrollwheel: false,
          // zoomControl: true,
          // zoomControlOptions: {
          //   style: google.maps.ZoomControlStyle.SMALL
          // },
          center: new google.maps.LatLng(47.455723, 19.124837)
        };
        map = new google.maps.Map(document.getElementById('gmap'), mapOptions);
        var image = '<?= get_stylesheet_directory_uri(); ?>/flag.png';
        var myLatLng = new google.maps.LatLng(47.455723, 19.124837);
        var beachMarker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: image
        });
      }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>





  <div class="main-container">

    <div class="center-content">

    <div id="primary" class="content-area">

      <main id="main" class="site-main" role="main">

        <div class="contact__left">
        <?php // WP Query

        while( have_posts() ) : the_post(); ?>

          <?php // Post format

          get_template_part( 'partials/content', 'page' ); ?>

        <?php endwhile; ?>
        </div>
        <div class="contact__right">
          <?php get_template_part('contact','form'); ?>
        </div>

      </main><!-- END .site-main -->

    </div><!-- END .content-area -->

    </div>

  </div><!-- END .main-container -->

  <?php // Comments

  if( comments_open() || get_comments_number() ) :

    comments_template( '', true );

  endif; ?>

<?php // Footer

get_footer(); ?>

