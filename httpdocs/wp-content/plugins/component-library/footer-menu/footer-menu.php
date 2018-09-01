<?php
/*
Plugin Name: Footer Menu
Description: Footer details and social media links
Author: William Chu
Version: 0.1
*/
function footer_menu($atts) {
  ob_start();
  $data = shortcode_atts(array(
    'hospital_name' => 'Hospital Name',
    'hospital_address' => '123 Street Address',
    'hospital_city' => 'Portland',
    'hospital_state' => 'OR',
    'hospital_zip' => '97204',
    'hospital_phone' => '123.456.7890',
    'hospital_fax' => '123.456.7890',
    'hospital_statement' => 'If you’re new to the area, recently welcomed a new four-legged member to your family or are just searching for an experienced vet that will provide you and your loved one with the respect and compassion you both deserve, we invite you to come by and give us a try.',
    'hospital_statement_link' => '#',
    'hospital_newsletter_link' => '#',
    'yelp_link' => '#',
    'facebook_link' => '#',
    'instagram_link' => '#',
    'google_link' => '#',
  ), $atts);
?>
<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
<div class="footer-menu-container">
  <div class="footer-menu-rail">
    <div class="footer-menu-grid">
      <div>
        <img class="footer-menu-logo" src="http://william.ivetbuilds.com/wp-content/uploads/2018/08/corgi.png" alt="hospital logo" />
        <h1 class="footer-menu-name"><?php echo $data['hospital_name']; ?></h1>
        <div class="footer-menu-contact">
          <h2 class="footer-menu-address"><?php echo $data['hospital_address']; ?></h2>
          <h2 class="footer-menu-address"><?php echo $data['hospital_city']; ?>, <?php echo $data['hospital_state']; ?> <?php echo $data['hospital_zip']; ?></h2>
          <h2 class="footer-menu-phone"><i class="fas fa-phone"></i> <?php echo $data['hospital_phone']; ?></h2>
          <h2 class="footer-menu-phone"><i class="fas fa-fax"></i> <?php echo $data['hospital_fax']; ?></h2>
        </div>
      </div>
      <div class="footer-menu-center-flex">
        <div>
          <h1 class="footer-menu-header">Experience You Can Trust</h1>
          <p class="footer-menu-statement"><?php echo $data['hospital_statement']; ?></p>
          <button class="footer-menu-button" onclick="window.location='<?php echo $data['hospital_statement_link']; ?>';">Learn More</button>
        </div>
        <div>
          <h1 class="footer-menu-header">Receive News Alerts</h1>
          <div class="footer-menu-input-flex">
            <input type="text" placeholder="Enter Full Name"></input>
            <input type="text" placeholder="Enter Email Address"></input>
          </div>
          <br>
          <button class="footer-menu-button" onclick="window.location='<?php echo $data['hospital_newsletter_link']; ?>';">Subscribe</button>
        </div>
      </div>
      <div class="footer-menu-social-flex">
        <a href="<?php echo $data['yelp_link']; ?>" target="_blank"><div class="footer-menu-social-button"><i class="fab fa-yelp"></i></div></a>
        <a href="<?php echo $data['facebook_link']; ?>" target="_blank"><div class="footer-menu-social-button"><i class="fab fa-facebook"></i></div></a>
        <a href="<?php echo $data['instagram_link']; ?>" target="_blank"><div class="footer-menu-social-button"><i class="fab fa-instagram"></i></div></a>
        <a href="<?php echo $data['google_link']; ?>" target="_blank"><div class="footer-menu-social-button"><i class="fab fa-google-plus"></i></div></a>
      </div>
    </div>
  </div>
</div>
<?php
return ob_get_clean();
}

add_shortcode('footer_menu', 'footer_menu');
function footer_menu_assets() {
wp_enqueue_script( 'FMscripts',  plugin_dir_url( __FILE__ ) . '/footer-menu.js', array( 'jquery' ) );
wp_enqueue_style( 'FMstyles',  plugin_dir_url( __FILE__ ) . '/footer-menu.css' );
}
add_action('wp_enqueue_scripts', 'footer_menu_assets');

?>
