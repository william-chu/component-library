<?php
/*
Plugin Name: Service Leaflets
Description: Displays services using a loop
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

function service_leaflets($atts) {
  ob_start();
  $data = shortcode_atts(array(
    'variable' => 'variable default'
  ), $atts);
  $args = array(
    'category_name' => 'Services'
  );
  $query = new WP_Query($args);
?>
<div class="service-leaflets-container">
  <div class="service-leaflets-rail">
    <h1>Areas of Expertise</h1>
    <div class="service-leaflets-grid">
      <!-- Begin loop  -->
      <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <a href="<?php the_permalink(); ?>">
          <div class="service-leaflets-item">
            <img class="service-leaflets-image" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="service image" />
            <h2 class="service-leaflets-title"><?php the_title(); ?></h2>
            <p><?php remove_filter( 'the_excerpt', 'wpautop' ); the_excerpt(); ?></p>
            <button class="service-leaflets-link">Read More</button>
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

add_shortcode('service_leaflets', 'service_leaflets');
function service_leaflets_assets() {
wp_enqueue_script( 'SLscripts',  plugin_dir_url( __FILE__ ) . '/service-leaflets.js', array( 'jquery' ) );
wp_enqueue_style( 'SLstyles',  plugin_dir_url( __FILE__ ) . '/service-leaflets.css' );
}
add_action('wp_enqueue_scripts', 'service_leaflets_assets');

?>
