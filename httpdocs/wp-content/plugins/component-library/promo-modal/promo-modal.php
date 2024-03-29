<?php
/*
Plugin Name: Promo Modal
Description: Shows modal on page load
Author: William Chu
Version: 0.1
*/
function promo_modal($atts) {
  ob_start();
  wp_enqueue_script( 'PRMscripts',  plugin_dir_url( __FILE__ ) . '/promo-modal.js', array( 'jquery' ) );
  $data = shortcode_atts(array(
    'image' => 'http://componentlibrary.blogdrop.eu/wp-content/uploads/2018/09/promo.png',
    'delay' => '2000',
  ), $atts);
  wp_localize_script('PRMscripts', 'PRMdata', $data);
?>

<div id="promo-modal-container">
  <div class="promo-modal-content">
    <span class="promo-modal-close-modal">&times;</span>
    <img src="<?php echo $data['image']; ?>" alt="promo image"/>
  </div>
</div>
<?php
return ob_get_clean();
}

add_shortcode('promo_modal', 'promo_modal');
function promo_modal_assets() {
wp_enqueue_style( 'PRMstyles',  plugin_dir_url( __FILE__ ) . '/promo-modal.css' );
}
add_action('wp_enqueue_scripts', 'promo_modal_assets');

?>
