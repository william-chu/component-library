<?php
/*
Plugin Name: Menu Colorful
Description: Responsive color menu
Author: William Chu
Version: 0.1
*/
  function menu_colorful($atts) {
  	ob_start();
  	$data = shortcode_atts(array(
  		'menu_title1' => 'Make Appointment',
  		'menu_title2' => 'Loyalty Program',
  		'menu_title3' => 'Pet Portal',
  		'menu_link1' => '#',
  		'menu_link2' => '#',
  		'menu_link3' => '#',
      'menu_text1' => 'Book Now',
      'menu_text2' => 'Earn Rewards',
      'menu_text3' => 'Sign In',
  	), $atts);
?>
<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
  <div class="menu-colorful-container">
    <div class="menu-colorful-rail">
      <div class="menu-colorful-grid">
        <a class="menu-colorful-link" href="<?php echo $data['menu_link1']; ?>">
          <div class="menu-colorful-item1 menu-colorful-item">
            <h2 class="menu-colorful-title"><?php echo $data['menu_title1']; ?></h2>
            <div class="menu-colorful-icon">
              <i class="far fa-calendar-plus"></i>
            </div>
            <h2 class="menu-colorful-text"><?php echo $data['menu_text1']; ?></h2>
          </div>
        </a>
        <a class="menu-colorful-link" href="<?php echo $data['menu_link2']; ?>">
          <div class="menu-colorful-item2 menu-colorful-item">
            <h2 class="menu-colorful-title"><?php echo $data['menu_title2']; ?></h2>
            <div class="menu-colorful-icon">
              <i class="far fa-star"></i>
            </div>
            <h2 class="menu-colorful-text"><?php echo $data['menu_text2']; ?></h2>
          </div>
        </a>
        <a class="menu-colorful-link" href="<?php echo $data['menu_link3']; ?>">
          <div class="menu-colorful-item3 menu-colorful-item">
            <h2 class="menu-colorful-title"><?php echo $data['menu_title3']; ?></h2>
            <div class="menu-colorful-icon">
              <i class="fas fa-globe-americas"></i>
            </div>
            <h2 class="menu-colorful-text"><?php echo $data['menu_text3']; ?></h2>
          </div>
        </a>
      </div>
    </div>
  </div>
	<?php
	return ob_get_clean();
}

add_shortcode('menu_colorful', 'menu_colorful');
function menu_colorful_assets() {
  wp_enqueue_script( 'MECscripts',  plugin_dir_url( __FILE__ ) . '/menu-colorful.js', array( 'jquery' ) );
	wp_enqueue_style( 'MECstyles',  plugin_dir_url( __FILE__ ) . '/menu-colorful.css' );
}
add_action('wp_enqueue_scripts', 'menu_colorful_assets');

?>
