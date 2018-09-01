<?php
/*
Plugin Name: Stats Odometer
Description: Responsive stats odometer, using https://github.hubspot.com/odometer/
Author: William Chu
Version: 0.1
*/
  function stats_odometer($atts) {
  	ob_start();
    wp_enqueue_script( 'SOscripts',  plugin_dir_url( __FILE__ ) . '/stats-odometer.js', array( 'jquery' ) );
  	$data = shortcode_atts(array(
  		'stat1' => 'Stat1',
  		'stat2' => 'Stat2',
  		'stat3' => 'Stat3',
  		'value1' => '111',
  		'value2' => '222',
  		'value3' => '333'
  	), $atts);
    wp_localize_script('SOscripts', 'SOdata', $data);
?>
  <div class="stats-odometer-container">
    <div class="stats-odometer-rail">
      <div class="stats-odometer-grid">
        <div class="stats-odometer-item">
          <div class="stats-odometer-value odometer" id="odometer1"></div>
          <h2 class="stats-odometer-text"><?php echo $data['stat1']; ?></h2>
        </div>
        <div class="stats-odometer-item">
          <div class="stats-odometer-value odometer" id="odometer2"></div>
          <h2 class="stats-odometer-text"><?php echo $data['stat2']; ?></h2>
        </div>
        <div class="stats-odometer-item">
          <div class="stats-odometer-value odometer" id="odometer3"></div>
          <h2 class="stats-odometer-text"><?php echo $data['stat3']; ?></h2>
        </div>
      </div>
    </div>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode('stats_odometer', 'stats_odometer');
function stats_odometer_assets() {
  wp_enqueue_script( 'odometerScripts',  plugin_dir_url( __FILE__ ) . '/odometer.js', array( 'jquery' ) );
  wp_enqueue_style( 'odometerStyles',  plugin_dir_url( __FILE__ ) . '/odometer-minimal-theme.css' );
  wp_enqueue_style( 'SOstyles',  plugin_dir_url( __FILE__ ) . '/stats-odometer.css' );
}
add_action('wp_enqueue_scripts', 'stats_odometer_assets');

?>
