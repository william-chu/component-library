<?php
/*
Plugin Name: Masthead Carousel
Description: Full width image carousel, images are 1500x800 and desaturated
Author: William Chu
Version: 0.1
*/
function masthead_carousel($atts) {
  ob_start();
  wp_enqueue_script( 'MCscripts',  plugin_dir_url( __FILE__ ) . '/masthead-carousel.js', array( 'jquery' ) );
  $data = shortcode_atts(array(
    'image1' => 'https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/masthead-carousel1.jpg',
    'image2' => 'https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/masthead-carousel2.jpg',
    'image3' => 'https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/masthead-carousel3.jpg',
    'headline1' => 'Headline 1 goes here',
    'headline2' => 'A different Headline 2',
    'headline3' => 'Last Headline 3',
    'background_color' => '#7496c4',
    'image_overlay' => 'radial-gradient( rgba(116, 150, 196, 0.5), rgba(130, 168, 218, 0.7) )',
  ), $atts);
  wp_localize_script('MCscripts', 'MCdata', $data);
?>
<div class="masthead-carousel-container" style="background: <?php echo $data['background_color']; ?>">
  <div id="masthead-carousel-rail">
    <div class="masthead-carousel-flex">
      <div id="masthead-carousel-image1" class="masthead-carousel-image" style="background: <?php echo $data['image_overlay']; ?>, url('<?php echo $data['image1']; ?>') bottom center / cover;">
      </div>
      <div id="masthead-carousel-image1" class="masthead-carousel-image" style="background: <?php echo $data['image_overlay']; ?>, url('<?php echo $data['image2']; ?>') bottom center / cover;">
      </div>
      <div id="masthead-carousel-image1" class="masthead-carousel-image" style="background: <?php echo $data['image_overlay']; ?>, url('<?php echo $data['image3']; ?>') bottom center / cover;">
      </div>
      <div onclick="backClick()" id="back-click" class="masthead-carousel-arrow"> <
      </div>
        <div class="masthead-carousel-body">
          <div><!-- Div for centering flexed text --></div>
          <h1 id="masthead-carousel-headline"><?php echo $data['headline1']; ?></h1>
          <div><!-- Div for centering flexed text --></div>
          <div class="masthead-carousel-controls">
            <div class="masthead-carousel-dots">
              <div onclick="dotClick(0)" id="dot0" class="masthead-carousel-dot masthead-carousel-dot-active">
              </div>
              <div onclick="dotClick(1)" id="dot1" class="masthead-carousel-dot">
              </div>
              <div onclick="dotClick(2)" id="dot2" class="masthead-carousel-dot">
              </div>
              <div id="masthead-carousel-pause" onclick="pauseToggle()" class="masthead-carousel-pause"> | |
              </div>
            </div>
          </div>
        </div>
      <div onclick="forwardClick()" id="forward-click" class="masthead-carousel-arrow"> >
      </div>
    </div>
  </div>
</div>
<?php
return ob_get_clean();
}

add_shortcode('masthead_carousel', 'masthead_carousel');
function masthead_carousel_assets() {

wp_enqueue_style( 'MCstyles',  plugin_dir_url( __FILE__ ) . '/masthead-carousel.css' );
}
add_action('wp_enqueue_scripts', 'masthead_carousel_assets');

?>
