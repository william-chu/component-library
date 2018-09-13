<?php
/*
Plugin Name: Nav Symmetric
Description: Navbar with logo in center, Appearance > Menus > Manage Locations > set menu you create to the Primary
Author: William Chu
Version: 0.1
*/
function nav_symmetric($atts) {
  ob_start();
  $data = shortcode_atts(array(
    'home_link' => '#homelink',
  ), $atts);
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div class="nav-symmetric-container">
  <div class="nav-symmetric-bar"></div>
  <div class="nav-symmetric-rail">
    <a href="<?php echo $data['home_link']; ?>">
      <img class="nav-symmetric-logo" src="http://componentlibrary.blogdrop.eu/wp-content/uploads/2018/09/logo.jpg" alt="company logo" />
    </a>
    <div class="nav-symmetric-fullscreen">
      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
    </div>
    <div id="nav-symmetric-menu-button" class="nav-symmetric-menu-button">
      <i class="fas fa-bars"></i>
    </div>
  </div>
</div>
<!-- Mobile Menu Modal -->
<div id="nav-symmetric-modal" class="nav-symmetric-modal">
  <div class="nav-symmetric-modal-content">
    <div class="nav-symmetric-mobile">
      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
    </div>
  </div>
</div>
<?php
return ob_get_clean();
}

add_shortcode('nav_symmetric', 'nav_symmetric');
function nav_symmetric_assets() {
wp_enqueue_script( 'NSscripts',  plugin_dir_url( __FILE__ ) . '/nav-symmetric.js', array( 'jquery' ) );
wp_enqueue_style( 'NSstyles',  plugin_dir_url( __FILE__ ) . '/nav-symmetric.css' );
}
add_action('wp_enqueue_scripts', 'nav_symmetric_assets');

?>
