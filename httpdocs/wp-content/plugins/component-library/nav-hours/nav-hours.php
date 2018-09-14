<?php
/*
Plugin Name: Nav Hours
Description: Navbar with hours, Appearance > Menus > Manage Locations > set menu you create to the Primary
Author: William Chu
Version: 0.1
*/
function nav_hours($atts) {
  ob_start();
  $data = shortcode_atts(array(
    'home_link' => '#homelink',
    'address' => '123 Street, Portland, OR 97204',
    'phone' => '123.456.7890',
    'email' => 'contact@email.com',
    'monday' => '8AM - 5PM',
    'tuesday' => '8AM - 5PM',
    'wednesday' => '8AM - 5PM',
    'thursday' => '8AM - 5PM',
    'friday' => '8AM - 5PM',
    'saturday' => '10AM - 5PM',
    'sunday' => '12PM - 5PM',
  ), $atts);
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div class="nav-hours-container">
  <div class="nav-hours-rail">
    <a href="<?php echo $data['home_link']; ?>">
      <img class="nav-hours-logo" src="http://componentlibrary.blogdrop.eu/wp-content/uploads/2018/09/logo3.png" alt="company logo" />
    </a>
    <div class="nav-hours-mobile-contact-flex">
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
    <div class="nav-hours-mobile-hours-flex">
          <p>Mon <?php echo $data['monday'] ; ?></p1>
          <p>Tue <?php echo $data['tuesday'] ; ?></p1>
          <p>Wed <?php echo $data['wednesday'] ; ?></p1>
          <p>Thu <?php echo $data['thursday'] ; ?></p1>
          <p>Fri <?php echo $data['friday'] ; ?></p1>
          <p>Sat <?php echo $data['saturday'] ; ?></p1>
          <p>Sun <?php echo $data['sunday'] ; ?></p1>
    </div>
    <div class="nav-hours-fullscreen">
      <div class="nav-hours-fullscreen-contact-flex">
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
      <div class="nav-hours-fullscreen-hours-flex">
          <div class="nav-hours-fullscreen-day-flex">
            <p>Mon</p>
            <p><?php echo $data['monday'] ; ?></p1>
          </div>
          <div class="nav-hours-fullscreen-day-flex">
            <p>Tue</p>
            <p><?php echo $data['tuesday'] ; ?></p1>
          </div>
          <div class="nav-hours-fullscreen-day-flex">
            <p>Wed</p>
            <p><?php echo $data['wednesday'] ; ?></p1>
          </div>
          <div class="nav-hours-fullscreen-day-flex">
            <p>Thu</p>
            <p><?php echo $data['thursday'] ; ?></p1>
          </div>
          <div class="nav-hours-fullscreen-day-flex">
            <p>Fri</p>
            <p><?php echo $data['friday'] ; ?></p1>
          </div>
          <div class="nav-hours-fullscreen-day-flex">
            <p>Sat</p>
            <p><?php echo $data['saturday'] ; ?></p1>
          </div>
          <div class="nav-hours-fullscreen-day-flex">
            <p>Sun</p>
            <p><?php echo $data['sunday'] ; ?></p1>
          </div>
        </div>
      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
    </div>
    <div id="nav-hours-menu-button" class="nav-hours-menu-button">
      <i class="fas fa-bars"></i>
    </div>
  </div>
</div>
<!-- Mobile Menu Modal -->
<div id="nav-hours-modal" class="nav-hours-modal">
  <div class="nav-hours-modal-content">
    <div class="nav-hours-mobile">
      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
    </div>
  </div>
</div>
<?php
return ob_get_clean();
}

add_shortcode('nav_hours', 'nav_hours');
function nav_hours_assets() {
wp_enqueue_script( 'NHscripts',  plugin_dir_url( __FILE__ ) . '/nav-hours.js', array( 'jquery' ) );
wp_enqueue_style( 'NHstyles',  plugin_dir_url( __FILE__ ) . '/nav-hours.css' );
}
add_action('wp_enqueue_scripts', 'nav_hours_assets');

?>
