<?php
/*
Plugin Name: Testimonial Bubbles
Description: Displays multiple testimonial posts as a bubbles
Author: William Chu
Version: 0.1
*/
function testimonial_bubbles($atts) {
  ob_start();
  $data = shortcode_atts(array(
    'icon' => 'https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/star.png',
  ), $atts);
  $args = array(
    'category_name' => 'Testimonials'
  );
  $query = new WP_Query($args);
?>
<div class="testimonial-bubbles-container">
  <div class="testimonial-bubbles-flex">
    <div>
      <img class="testimonial-bubbles-icon" src="<?php echo $data['icon']; ?>" alt="star icon" />
      <h1>Satisfied Customers</h1>
      <div id="testimonial-bubbles">
        <!-- Begin loop  -->
        <?php $i=0; // set up a basic counter counter ?>
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="testimonial-bubbles-slide" <?php if ($i > 2) echo 'style="display:none"'; ?>>
            <div class="testimonial-bubbles-body">
              <?php the_content(); ?>
              <div class="testimonial-bubbles-author">- <?php the_title(); ?></div>
            </div>
          </div>
        <?php $i++; // increase the counter ?>
        <?php endwhile; else : ?>
          <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        <!-- End Loop -->
      </div>
    </div>
  </div>
</div>
<?php
return ob_get_clean();
}

add_shortcode('testimonial_bubbles', 'testimonial_bubbles');
function testimonial_bubbles_assets() {
wp_enqueue_script( 'TBscripts',  plugin_dir_url( __FILE__ ) . '/testimonial-bubbles.js', array( 'jquery' ) );
wp_enqueue_style( 'TBstyles',  plugin_dir_url( __FILE__ ) . '/testimonial-bubbles.css' );
}
add_action('wp_enqueue_scripts', 'testimonial_bubbles_assets');

?>
