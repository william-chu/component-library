<?php
/*
Plugin Name: Action Grid
Description: Call to action plugin
Author: William Chu
Version: 0.1
*/
  function action_grid($atts) {
  	ob_start();
  	$data = shortcode_atts(array(
  		'headline' => 'No Appointments - Walk In Today!',
  		'action_header1' => 'Services & Pricing',
      'action_header2' => 'Register and Check-In Online',
  		'action_description1' => 'A new breed of veterinary clinic. We focus on affordable, preventative and minor illness care.',
      'action_description2' => 'Planning to visit us? Save time by registering and checking-in online. When you walk in to see us, check-in will be fast and easy!',
  		'action_button1' => 'View Our Services',
      'action_button2' => 'Register and Check-In Here',
      'action_link1' => '#',
      'action_link2' => '#'
  	), $atts);
?>
  <div class="action-grid-container">
    <div class="action-grid-rail">
      <h1><?php echo $data['headline']; ?></h1>
      <div class="ribbon-shadow"></div>
      <div class="action-grid">
        <div class="action-grid-icon-flex">
          <img class="action-grid-icon" src="http://william.ivetbuilds.com/wp-content/uploads/2018/08/heart.png" alt="heart icon" />
        </div>
        <div class="action-grid-text">
          <h2><?php echo $data['action_header1']; ?></h2>
          <p><?php echo $data['action_description1']; ?></p>
          <button onclick="window.location='<?php echo $data['action_link1']; ?>';"><?php echo $data['action_button1']; ?></button>
        </div>
      </div>
      <div class=action-grid>
        <div class="action-grid-icon-flex">
          <img class="action-grid-icon" src="http://william.ivetbuilds.com/wp-content/uploads/2018/08/registration.png" alt="pencil and paper icon" />
        </div>
        <div class="action-grid-text">
          <h2><?php echo $data['action_header2']; ?></h2>
          <p><?php echo $data['action_description2']; ?></p>
          <button onclick="window.location='<?php echo $data['action_link2']; ?>';"><?php echo $data['action_button2']; ?></button>
        </div>
      </div>
    </div>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode('action_grid', 'action_grid');
function action_grid_assets() {
  wp_enqueue_script( 'AGscripts',  plugin_dir_url( __FILE__ ) . '/action-grid.js', array( 'jquery' ) );
	wp_enqueue_style( 'AGstyles',  plugin_dir_url( __FILE__ ) . '/action-grid.css' );
}
add_action('wp_enqueue_scripts', 'action_grid_assets');

?>
