<?php
/*
Plugin Name: Menu Fade
Description: Responsive fade in menu
Author: William Chu
Version: 0.1
*/
  function menu_fade($atts) {
  	ob_start();
  	$data = shortcode_atts(array(
  		'menu_title1' => 'Contact Us',
  		'menu_title2' => 'Our Services',
  		'menu_title3' => 'Make Appointment',
  		'menu_img1' => 'http://william.ivetbuilds.com/wp-content/uploads/2018/08/contact.jpg',
  		'menu_img2' => 'http://william.ivetbuilds.com/wp-content/uploads/2018/08/services.jpg',
  		'menu_img3' => 'http://william.ivetbuilds.com/wp-content/uploads/2018/08/appointment.jpg',
  		'menu_link1' => '#',
  		'menu_link2' => '#',
  		'menu_link3' => '#'
  	), $atts);
?>
  <div class="menu-fade-container">
    <div class="menu-fade-rail">
      <div class="menu-fade-grid">
        <a href="<?php echo $data['menu_link1']; ?>">
          <div class="menu-fade-item">
            <div class="menu-fade-overlay-container">
              <img class="menu-fade-image" src="<?php echo $data['menu_img1']; ?>" alt="image of dog and cat" />
              <div class="menu-fade-overlay">
                <h2 class="menu-fade-text"><?php echo $data['menu_title1']; ?></h2>
              </div>
            </div>
            <img class="menu-fade-icon" src="https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/placemarker.png" alt="placemarker icon" />
          </div>
        </a>
        <a href="<?php echo $data['menu_link2']; ?>">
          <div class="menu-fade-item">
            <div class="menu-fade-overlay-container">
              <img class="menu-fade-image" src="<?php echo $data['menu_img2']; ?>" alt="image of man and dog" />
              <div class="menu-fade-overlay">
                <h2 class="menu-fade-text"><?php echo $data['menu_title2']; ?></h2>
              </div>
            </div>
            <img class="menu-fade-icon" src="https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/health.png" alt="clinic icon" />
          </div>
        </a>
        <a href="<?php echo $data['menu_link3']; ?>">
          <div class="menu-fade-item">
            <div class="menu-fade-overlay-container">
              <img class="menu-fade-image" src="<?php echo $data['menu_img3']; ?>" alt="image of woman and cat" />
              <div class="menu-fade-overlay">
                <h2 class="menu-fade-text"><?php echo $data['menu_title3']; ?></h2>
              </div>
            </div>
            <img class="menu-fade-icon" src="https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/calendar.png" alt="calendar icon" />
          </div>
        </a>
      </div>
    </div>
  </div>
	<?php
	return ob_get_clean();
}

add_shortcode('menu_fade', 'menu_fade');
function menu_fade_assets() {
  wp_enqueue_script( 'MFscripts',  plugin_dir_url( __FILE__ ) . '/menu-fade.js', array( 'jquery' ) );
	wp_enqueue_style( 'MFstyles',  plugin_dir_url( __FILE__ ) . '/menu-fade.css' );
}
add_action('wp_enqueue_scripts', 'menu_fade_assets');

?>
