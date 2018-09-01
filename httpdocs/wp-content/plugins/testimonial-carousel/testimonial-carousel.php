<?php
/*
Plugin Name: Testimonial Carousel
Description: Displays testimonial posts as a carousel
Author: William Chu
Version: 0.1
*/
function testimonial_carousel($atts) {
  ob_start();
  $data = shortcode_atts(array(
    'variable' => 'variable default',
  ), $atts);
  $args = array(
    'category_name' => 'Testimonials'
  );
  $query = new WP_Query($args);
?>
<div class="testimonial-carousel-container">
  <div class="testimonial-carousel-flex">
    <div id="back-click" class="testimonial-carousel-arrow">
      <
    </div>
    <div>
      <h1>Customer Feedback</h1>
      <!-- Begin loop  -->
        <div id="testimonial-carousel">
          <!-- <?php $i=0; // set up a basic counter counter ?> -->
          <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="testimonial-carousel-slide" <?php if ($i > 0) echo 'style="display:none"'; ?>>
              <div class="testimonial-body">
                <p>"<?php remove_filter( 'the_content', 'wpautop' ); the_content(); ?>"</p>
                <div class="testimonial-author">
                  <img class="testimonial-carousel-author-img" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="testimonial author photo"/>
                  <br>
                  <span>- <?php the_title(); ?></span>
                </div>
              </div>
            </div>
          <?php $i++; // increase the counter ?>
          <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
          <?php endif; ?>
        </div>
        <!-- End Loop -->
    </div>
    <div id="forward-click" class="testimonial-carousel-arrow">
      >
    </div>
  </div>
</div>
<?php
return ob_get_clean();
}

add_shortcode('testimonial_carousel', 'testimonial_carousel');
function testimonial_carousel_assets() {
wp_enqueue_script( 'TCscripts',  plugin_dir_url( __FILE__ ) . '/testimonial-carousel.js', array( 'jquery' ) );
wp_enqueue_style( 'TCstyles',  plugin_dir_url( __FILE__ ) . '/testimonial-carousel.css' );
}
add_action('wp_enqueue_scripts', 'testimonial_carousel_assets');

?>
