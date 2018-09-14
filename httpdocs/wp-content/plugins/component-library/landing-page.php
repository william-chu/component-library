<?php
/*
Plugin Name: Component Library
Description: Reusable Components
Author: William Chu
Version: 0.1
*/
function landing_page($atts) {
	ob_start();
	$data = shortcode_atts(array(
		'variable' => 'variable default',
	), $atts);
	?>
	<div></div>
	<?php
	return ob_get_clean();
}

add_shortcode('landing_page', 'landing_page');
function landing_page_assets() {
  wp_enqueue_script( 'LPscripts',  plugin_dir_url( __FILE__ ) . '/landing-page.js', array( 'jquery' ) );
  wp_enqueue_style( 'LPstyles',  plugin_dir_url( __FILE__ ) . '/landing-page.css' );
}
add_action('wp_enqueue_scripts', 'landing_page_assets');

require( dirname( __FILE__ ) . '/menu-fade/menu-fade.php');
require( dirname( __FILE__ ) . '/action-grid/action-grid.php');
require( dirname( __FILE__ ) . '/service-leaflets/service-leaflets.php');
require( dirname( __FILE__ ) . '/service-accordion/service-accordion.php');
require( dirname( __FILE__ ) . '/testimonial-carousel/testimonial-carousel.php');
require( dirname( __FILE__ ) . '/testimonial-bubbles/testimonial-bubbles.php');
require( dirname( __FILE__ ) . '/stats-odometer/stats-odometer.php');
require( dirname( __FILE__ ) . '/service-tile/service-tile.php');
require( dirname( __FILE__ ) . '/location-grid/location-grid.php');
require( dirname( __FILE__ ) . '/blog-list/blog-list.php');
require( dirname( __FILE__ ) . '/footer-menu/footer-menu.php');
require( dirname( __FILE__ ) . '/masthead-carousel/masthead-carousel.php');
require( dirname( __FILE__ ) . '/menu-colorful/menu-colorful.php');
require( dirname( __FILE__ ) . '/blog-scroll/blog-scroll.php');
require( dirname( __FILE__ ) . '/plan-menu/plan-menu.php');
require( dirname( __FILE__ ) . '/service-flip/service-flip.php');
require( dirname( __FILE__ ) . '/nav-symmetric/nav-symmetric.php');
require( dirname( __FILE__ ) . '/nav-pets/nav-pets.php');
require( dirname( __FILE__ ) . '/blog-three/blog-three.php');
require( dirname( __FILE__ ) . '/promo-modal/promo-modal.php');
require( dirname( __FILE__ ) . '/masthead-parallax/masthead-parallax.php');
require( dirname( __FILE__ ) . '/nav-hours/nav-hours.php');

?>
