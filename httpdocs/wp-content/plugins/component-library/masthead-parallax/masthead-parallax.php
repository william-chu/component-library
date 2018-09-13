<?php
/*
Plugin Name: Masthead Parallax
Description: Full width masthead with sideways parallax based on https://codepen.io/Jursdotme/pen/wWMKmo
Author: William Chu
Version: 0.1
*/
function masthead_parallax($atts) {
  ob_start();
  wp_enqueue_script( 'MPscripts',  plugin_dir_url( __FILE__ ) . '/masthead-parallax.js', array( 'jquery' ) );
  $data = shortcode_atts(array(
    'headline' => 'Embark Toward Better Pet Health',
    'link' => '#appointmentlink',
  ), $atts);
  wp_localize_script('MPscripts', 'MPdata', $data);
?>
<div class="masthead-parallax-container">
  <h1 class="masthead-parallax-headline"><?php echo $data['headline']; ?></h1>
  <div class="masthead-parallax-parallax-layer masthead-parallax-layer-5"></div>
  <div class="masthead-parallax-parallax-layer masthead-parallax-layer-4"></div>
  <div class="masthead-parallax-parallax-layer masthead-parallax-layer-3"></div>
  <div class="masthead-parallax-parallax-layer masthead-parallax-layer-2"></div>
  <div class="masthead-parallax-parallax-layer masthead-parallax-layer-1"></div>
  <div class="masthead-parallax-dog"><img src="http://componentlibrary.blogdrop.eu/wp-content/uploads/2018/09/walkingdog.gif" alt="walking dog"></div>
  <div class="masthead-parallax-link"><a href="<?php echo $data['link']; ?>" >Book Appointment</a></div>
</div>
<div class="masthead-parallax-fade"></div>
<?php
return ob_get_clean();
}

add_shortcode('masthead_parallax', 'masthead_parallax');
function masthead_parallax_assets() {

wp_enqueue_style( 'MPstyles',  plugin_dir_url( __FILE__ ) . '/masthead-parallax.css' );
}
add_action('wp_enqueue_scripts', 'masthead_parallax_assets');

?>
