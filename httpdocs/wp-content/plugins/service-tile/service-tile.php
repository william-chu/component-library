<?php
/*
Plugin Name: Service Tile
Description: Displays services a full width tiles using a loop
Author: William Chu
Version: 0.1
*/

// To limit character length, add fn below to theme function.php file
// /**
//  * Limit excerpt to a number of characters without cutting last word
//  * @param string $excerpt
//  * @return string
// */
// function custom_short_excerpt($excerpt){
// 	$limit = 200;
// 	if (strlen($excerpt) > $limit) {
// 		return substr($excerpt, 0, strpos($excerpt, ' ', $limit)) . " [...]";
// 	}
// 	return $excerpt;
// }
// add_filter('the_excerpt', 'custom_short_excerpt');

function service_tile($atts) {
  ob_start();
  $data = shortcode_atts(array(
    'variable' => 'variable default'
  ), $atts);
  $args = array(
    'category_name' => 'Services'
  );
  $query = new WP_Query($args);
?>
<div class="service-tile">
  <div class="service-tile-rail">
    <h1>Our Services</h1>
    <div class="service-tile-grid">
      <!-- Begin loop  -->
      <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="service-tile-item">
          <div class="service-tile-container">
            <img class="service-tile-image" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="service image" />
            <a href="<?php the_permalink(); ?>">
              <div class="service-tile-overlay">
                <h2 class="service-tile-title"><?php the_title(); ?></h2>
                <div class="service-tile-body">
                  <?php remove_filter( 'the_excerpt', 'wpautop' ); the_excerpt(); ?>
                  <div class="service-tile-link">Read More</div>
                </div>
              </div>
            </a>
          </div>

        </div>
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

add_shortcode('service_tile', 'service_tile');
function service_tile_assets() {
wp_enqueue_script( 'STscripts',  plugin_dir_url( __FILE__ ) . '/service-tile.js', array( 'jquery' ) );
wp_enqueue_style( 'STstyles',  plugin_dir_url( __FILE__ ) . '/service-tile.css' );
}
add_action('wp_enqueue_scripts', 'service_tile_assets');

?>
