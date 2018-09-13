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
  	  'headline' => 'Call to action headline',
  	  'action_header1' => 'First action header',
      'action_header2' => 'Second action header',
  	  'action_description1' => 'First action description text goes here',
      'action_description2' => 'Second action description text goes here',
  	  'action_button1' => 'First action button',
      'action_button2' => 'Second action button',
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
          <img class="action-grid-icon" src="http://componentlibrary.blogdrop.eu/wp-content/uploads/2018/09/heart.png" alt="heart icon" />
        </div>
        <div class="action-grid-text">
          <h2><?php echo $data['action_header1']; ?></h2>
          <p><?php echo $data['action_description1']; ?></p>
          <button onclick="window.location='<?php echo $data['action_link1']; ?>';"><?php echo $data['action_button1']; ?></button>
        </div>
      </div>
      <div class=action-grid>
        <div class="action-grid-icon-flex">
          <img class="action-grid-icon" src="http://componentlibrary.blogdrop.eu/wp-content/uploads/2018/09/registration.png" alt="pencil and paper icon" />
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
