<?php
/*
Plugin Name: Service Flip
Description: Service list with flip hover effect, change posts per page to show more items
Author: William Chu
Version: 0.1
*/
function service_flip($atts) {
  ob_start();
  $data = shortcode_atts(array(
  ), $atts);
  $args = array(
    'category_name' => 'Services',
    'posts_per_page' => '4',
  );
  $query = new WP_Query($args);
?>
<div class="service-flip-container">
  <div class="service-flip-rail">
    <div class="service-flip-grid">
      <!-- Begin loop  -->
      <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
      <a class="service-flip-link" href="<?php the_permalink(); ?>">
        <div class="service-flip-item">
          <div class="service-flip-card">
            <div class="side">
              <h2 class="service-flip-title"><?php the_title(); ?></h2>
              <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="image of special">
            </div>
            <div class="side back">
              <p class="service-flip-text"><?php remove_filter( 'the_excerpt', 'wpautop' ); the_excerpt(); ?></p>
              <p class="service-flip-text">click to learn more</p>
            </div>
          </div>
        </div>
      </a>
      <?php endwhile; else : ?>
      <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
      <!-- End Loop -->
    </div>
  </div>
</div>
<?php
return ob_get_clean();
}

add_shortcode('service_flip', 'service_flip');
function service_flip_assets() {
wp_enqueue_script( 'SFscripts',  plugin_dir_url( __FILE__ ) . '/service-flip.js', array( 'jquery' ) );
wp_enqueue_style( 'SFstyles',  plugin_dir_url( __FILE__ ) . '/service-flip.css' );
}
add_action('wp_enqueue_scripts', 'service_flip_assets');

?>
