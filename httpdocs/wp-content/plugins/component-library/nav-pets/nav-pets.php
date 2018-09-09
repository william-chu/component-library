<?php
/*
Plugin Name: Nav Pets
Description: Navbar with pets, Appearance > Menus > Manage Locations > set menu you create to the Primary
Author: William Chu
Version: 0.1
*/
function nav_pets($atts) {
  ob_start();
  $data = shortcode_atts(array(
    'home_link' => '#homelink',
    'address' => '123 Street, Portland, OR 97204',
    'phone' => '123.456.7890',
    'email' => 'contact@email.com',
  ), $atts);
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div class="nav-pets-container">
  <div class="nav-pets-bar"></div>
  <div class="nav-pets-rail">
    <a href="<?php echo $data['home_link']; ?>">
      <img class="nav-pets-logo" src="https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/logo2.png" alt="company logo" />
    </a>
    <div class="nav-pets-mobile-contact-flex">
      <div>
        <?php echo $data['address']; ?>
      </div>
      <a href="tel:+01-<?php echo $data['phone']; ?>">
        <div>
          <?php echo $data['phone']; ?>
        </div>
      </a>
      <a href="mailto:<?php echo $data['email']; ?>">
        <div>
          <?php echo $data['email']; ?>
        </div>
      </a>
    </div>
    <div class="nav-pets-fullscreen">
      <div class="nav-pets-fullscreen-contact-flex">
        <div>
          <i class="fas fa-map-marker-alt"></i>
          <?php echo $data['address']; ?>
        </div>
        <div>|</div>
        <a href="tel:+01-<?php echo $data['phone']; ?>">
          <div>
            <i class="fas fa-phone-square"></i>
            <?php echo $data['phone']; ?>
          </div>
        </a>
        <div>|</div>
        <a href="mailto:<?php echo $data['email']; ?>">
          <div>
            <i class="far fa-envelope"></i>
            <?php echo $data['email']; ?>
          </div>
        </a>
      </div>
      <div class="nav-pets-fullscreen-cat-flex">
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
        <div id="nav-pets-cat-image-container">
          <img id="nav-pets-cat-looking-up" src="https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/navcat1.png" alt="cat looking up"/>
          <img id="nav-pets-cat-looking-down" src="https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/navcat2.png" alt="cat looking down"/>
        </div>
      </div>
    </div>
    <div id="nav-pets-menu-button" class="nav-pets-menu-button">
      <i class="fas fa-bars"></i>
    </div>
  </div>
</div>
<!-- Mobile Menu Modal -->
<div id="nav-pets-modal" class="nav-pets-modal">
  <div class="nav-pets-modal-content">
    <div class="nav-pets-mobile">
      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
    </div>
  </div>
</div>
<?php
return ob_get_clean();
}

add_shortcode('nav_pets', 'nav_pets');
function nav_pets_assets() {
wp_enqueue_script( 'NPscripts',  plugin_dir_url( __FILE__ ) . '/nav-pets.js', array( 'jquery' ) );
wp_enqueue_style( 'NPstyles',  plugin_dir_url( __FILE__ ) . '/nav-pets.css' );
}
add_action('wp_enqueue_scripts', 'nav_pets_assets');

?>
