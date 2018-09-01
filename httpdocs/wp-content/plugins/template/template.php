<?php
/*
Plugin Name: Template
Description: Description
Author: William Chu
Version: 0.1
*/
function dynamic_service_grid($atts) {
  ob_start();
  $data = shortcode_atts(array(
    'variable' => 'variable default',
  ), $atts);
?>
<div class="dynamic-service-grid-container">
  <p>Component works!</p>
</div>
<?php
return ob_get_clean();
}

add_shortcode('dynamic_service_grid', 'dynamic_service_grid');
function dynamic_service_grid_assets() {
wp_enqueue_script( 'DSGscripts',  plugin_dir_url( __FILE__ ) . '/dynamic-service-grid.js', array( 'jquery' ) );
wp_enqueue_style( 'DSGstyles',  plugin_dir_url( __FILE__ ) . '/dynamic-service-grid.css' );
}
add_action('wp_enqueue_scripts', 'dynamic_service_grid_assets');

?>
