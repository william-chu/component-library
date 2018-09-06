<?php
/*
Plugin Name: Service Accordion
Description: Displays services using a loop, accordion
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

function service_accordion($atts) {
  ob_start();
  $data = shortcode_atts(array(
    'variable' => 'variable default'
  ), $atts);
  $args = array(
    'category_name' => 'Services'
  );
  $query = new WP_Query($args);
?>
<div class="service-accordion-container">
  <div class="service-accordion-flex">
    <img src="https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/servicesdog.jpg" alt="picture of dog" />
    <div class="service-accordion-rail">
      <h1>Services</h1>
      <div class="service-accordion">
        <!-- Begin loop  -->
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="service-accordion-item">
            <button class="service-accordion-button"><?php the_title(); ?></button>
            <div class="service-accordion-details">
              <div>
                <?php the_excerpt(); ?>
              </div>
              <a class="service-accordion-link" href="<?php the_permalink(); ?>">Learn More</a>
            </div>
          </div>
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

add_shortcode('service_accordion', 'service_accordion');
function service_accordion_assets() {
wp_enqueue_script( 'SAscripts',  plugin_dir_url( __FILE__ ) . '/service-accordion.js', array( 'jquery' ) );
wp_enqueue_style( 'SAstyles',  plugin_dir_url( __FILE__ ) . '/service-accordion.css' );
}
add_action('wp_enqueue_scripts', 'service_accordion_assets');

?>
