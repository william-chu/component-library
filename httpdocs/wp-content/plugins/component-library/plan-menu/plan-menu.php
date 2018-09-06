<?php
/*
Plugin Name: Plan Menu
Description: Shows membership plans for pets, images should be 2 x 1 width and height, chart takes the services array and then adds symbol to the plan chart based on the yes and no array for each plan.
Author: William Chu
Version: 0.1
*/
function plan_menu($atts) {
  ob_start();
  wp_enqueue_script( 'PMscripts',  plugin_dir_url( __FILE__ ) . '/plan-menu.js', array( 'jquery' ) );
  $data = shortcode_atts(array(
    'headline' => 'Select Your Plan',
    'cat_image' => 'https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/pet-plan-cat.jpg',
    'dog_image' => 'https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/pet-plan-dog.jpg',
    'cat_plan_price' => '10',
    'dog_plan_price' => '12',
    'plus_plan_premium' => '12',
    'elite_plan_premium' => '18',
    'enrollment_fee' => '79',
    'microchip_fee' => '49',
    'senior_fee' => '10',
    'youth_fee' => '36',
    'youth_services' => 'receive two dewormings<br>for hook & roundworms',
    'cat_plan_select_link' => '#catselect',
    'dog_plan_select_link' => '#dogselect',
    'cat_plan_services' => 'Exam ($10 copay), FVRCP (Distemper), FeLV Vaccine, Rabies Vaccine, Yearly Parasite Test, Yearly Bloodwork, Toe Nail Trim (4 per year), Blood Pressure',
    'cat_basic_service' => 'yes, yes ,yes, yes, no, no, no, no',
    'cat_plus_service' => 'yes, yes, yes, yes, yes, yes, no, no',
    'cat_elite_service' => 'yes, yes, yes, yes, yes, yes, yes, yes',
    'dog_plan_services' => 'Exam ($10 copay), DHP (Distemper), Parvo Vaccine, Lepto Vaccine, Kennel Cough Vaccine, Rabies Vaccine, Yearly Parasite Test, Yearly Bloodwork, Toe Nail Trim (4 per year), Blood Pressure',
    'dog_basic_service' => 'yes, yes ,yes, yes, yes, yes, no, no, no, no',
    'dog_plus_service' => 'yes, yes, yes, yes, yes, yes, yes, yes, no, no',
    'dog_elite_service' => 'yes, yes, yes, yes, yes, yes, yes, yes, yes, yes',
  ), $atts);
  wp_localize_script('PMscripts', 'PMdata', $data);
?>
<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
<div id="plan-menu-container" class="plan-menu-container">
  <div class="plan-menu-rail">
    <h1 class="plan-menu-header"><?php echo $data['headline']; ?></h1>
    <div class="plan-menu-grid plan-menu-fade">
      <div class="plan-menu-item">
        <img class="plan-menu-image" src="<?php echo $data['cat_image'];?>" alt="photo of cat"/>
        <div class="plan-menu-paw">
          <!-- Paw print svg -->
          <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" fill="#7bcc7b" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M12,9.4c-4.8,0-8.9,7.7-8.9,11.5c0,1.2,0.5,1.6,0.9,1.9c0.6,0.3,1.4,0.5,2.8,0.5c0.7,0,1.4,0,2.2-0.1C10,23.1,11,23,12,23   s2,0,2.9,0.1c0.8,0,1.6,0.1,2.2,0.1c2.8,0,3.7-0.6,3.7-2.3C20.9,17.1,16.8,9.4,12,9.4z"/><path d="M5.8,9.6c0-0.9-0.8-4.5-2.3-4.5c-1.6,0-2.4,3.6-2.4,4.5c0,1.3,1.1,2.3,2.4,2.3C4.8,11.9,5.8,10.9,5.8,9.6z"/><path d="M8.8,7.7c1.3,0,2.3-1.1,2.3-2.3c0-0.9-0.8-4.5-2.3-4.5c-1.6,0-2.4,3.6-2.4,4.5C6.5,6.6,7.5,7.7,8.8,7.7z"/><path d="M20.5,5.1c-1.6,0-2.4,3.6-2.4,4.5c0,1.3,1.1,2.3,2.4,2.3s2.4-1.1,2.4-2.3C22.9,8.7,22.1,5.1,20.5,5.1z"/><path d="M15.2,7.7c1.3,0,2.3-1.1,2.3-2.3c0-0.9-0.8-4.5-2.3-4.5c-1.6,0-2.4,3.6-2.4,4.5C12.8,6.6,13.9,7.7,15.2,7.7z"/></g></svg>
          <h2 class="plan-menu-price"><span class="plan-menu-price-sign">$</span><?php echo $data['cat_plan_price']; ?></h2>
          <h2 class="plan-menu-price-time">per month<br><em>basic plan</em></h2>
        </div>
        <div class="plan-menu-details">
          <div class="plan-menu-general">
            <p class="plan-menu-details-charge">Enrollment Fee:</p>
            <p class="plan-menu-details-value"><strong>$<?php echo $data['enrollment_fee']; ?></strong> <em>(one-time fee)</em></p>
            <p class="plan-menu-details-charge">Microchip Fee:</p>
            <p class="plan-menu-details-value"><strong>$<?php echo $data['microchip_fee']; ?></strong> <em>(one-time fee)</em></p>
          </div>
          <div class="plan-menu-youth">
            <p class="plan-menu-details-charge">Kittens (under 6 months age):</p>
            <p class="plan-menu-details-value-text"><?php echo $data['youth_services']; ?></p>
            <p class="plan-menu-details-charge">Kittens requiring 2+ sets of vaccines:</p>
            <p class="plan-menu-details-value"><strong>$<?php echo $data['youth_fee']; ?></strong> <em>(one-time fee)</em></p>
          </div>
          <div class="plan-menu-senior">
            <p class="plan-menu-details-charge">Seniors (over 7 years of age):</p>
            <p class="plan-menu-details-value"><strong>+$<?php echo $data['senior_fee']; ?></strong> <em>(per month)</em></p>
          </div>
          <div class="plan-menu-buttons">
            <div class="plan-menu-button-flex">
              <button id="cat-chart-detail-button" class="plan-menu-button-detail">Plan Detail</button>
              <button onclick="window.location='<?php echo $data['cat_plan_select_link']; ?>';" class="plan-menu-button-select">Select Plan</button>
            </div>
          </div>
        </div>
      </div>
      <div class="plan-menu-item">
        <img class="plan-menu-image" src="<?php echo $data['dog_image'];?>" alt="photo of dog"/>
        <div class="plan-menu-paw">
          <!-- Paw print svg -->
          <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" fill="#7bcc7b" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M12,9.4c-4.8,0-8.9,7.7-8.9,11.5c0,1.2,0.5,1.6,0.9,1.9c0.6,0.3,1.4,0.5,2.8,0.5c0.7,0,1.4,0,2.2-0.1C10,23.1,11,23,12,23   s2,0,2.9,0.1c0.8,0,1.6,0.1,2.2,0.1c2.8,0,3.7-0.6,3.7-2.3C20.9,17.1,16.8,9.4,12,9.4z"/><path d="M5.8,9.6c0-0.9-0.8-4.5-2.3-4.5c-1.6,0-2.4,3.6-2.4,4.5c0,1.3,1.1,2.3,2.4,2.3C4.8,11.9,5.8,10.9,5.8,9.6z"/><path d="M8.8,7.7c1.3,0,2.3-1.1,2.3-2.3c0-0.9-0.8-4.5-2.3-4.5c-1.6,0-2.4,3.6-2.4,4.5C6.5,6.6,7.5,7.7,8.8,7.7z"/><path d="M20.5,5.1c-1.6,0-2.4,3.6-2.4,4.5c0,1.3,1.1,2.3,2.4,2.3s2.4-1.1,2.4-2.3C22.9,8.7,22.1,5.1,20.5,5.1z"/><path d="M15.2,7.7c1.3,0,2.3-1.1,2.3-2.3c0-0.9-0.8-4.5-2.3-4.5c-1.6,0-2.4,3.6-2.4,4.5C12.8,6.6,13.9,7.7,15.2,7.7z"/></g></svg>
          <h2 class="plan-menu-price"><span class="plan-menu-price-sign">$</span><?php echo $data['dog_plan_price']; ?></h2>
          <h2 class="plan-menu-price-time">per month <br><em>basic plan</em></h2>
        </div>
        <div class="plan-menu-details">
          <div class="plan-menu-general">
            <p class="plan-menu-details-charge">Enrollment Fee:</p>
            <p class="plan-menu-details-value"><strong>$<?php echo $data['enrollment_fee']; ?></strong> <em>(one-time fee)</em></p>
            <p class="plan-menu-details-charge">Microchip Fee:</p>
            <p class="plan-menu-details-value"><strong>$<?php echo $data['microchip_fee']; ?></strong> <em>(one-time fee)</em></p>
          </div>
          <div class="plan-menu-youth">
            <p class="plan-menu-details-charge">Puppies (under 6 months age):</p>
            <p class="plan-menu-details-value-text"><?php echo $data['youth_services']; ?></p>
            <p class="plan-menu-details-charge">Puppies requiring 2+ sets of vaccines:</p>
            <p class="plan-menu-details-value"><strong>$<?php echo $data['youth_fee']; ?></strong> <em>(one-time fee)</em></p>
          </div>
          <div class="plan-menu-senior">
            <p class="plan-menu-details-charge">Seniors (over 7 years of age):</p>
            <p class="plan-menu-details-value"><strong>+$<?php echo $data['senior_fee']; ?></strong> <em>(per month)</em></p>
          </div>
          <div class="plan-menu-buttons">
            <div class="plan-menu-button-flex">
              <button id="dog-chart-detail-button" class="plan-menu-button-detail">Plan Detail</button>
              <button onclick="window.location='<?php echo $data['dog_plan_select_link']; ?>';" class="plan-menu-button-select">Select Plan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Cat Plan Modal -->
<div id="cat-chart-modal" class="modal">
  <span class="close-modal">&#10005;</span>
  <div class="modal-content">
    <div class="plan-menu-chart-container">
      <h1 class="plan-menu-chart-header">Feline Wellness Plans</h1>
      <div class="plan-menu-chart-grid">
        <h2><i class="far fa-plus-square"></i><br>Service</h2>
        <h2><i class="far fa-circle"></i><br>Basic</h2>
        <h2><i class="far fa-square"></i><br>Plus</h2>
        <h2><i class="far fa-star"></i><br>Elite</h2>
      </div>
      <div class="plan-menu-chart-grid">
        <div id="plan-menu-cat-service-list" class="plan-menu-chart-flex">
        </div>
        <div id="plan-menu-cat-basic-plan" class="plan-menu-chart-flex plan-menu-icon-list">
        </div>
        <div id="plan-menu-cat-plus-plan" class="plan-menu-chart-flex plan-menu-icon-list">
        </div>
        <div id="plan-menu-cat-elite-plan" class="plan-menu-chart-flex plan-menu-icon-list">
        </div>
      </div>
      <div class="plan-menu-chart-grid plan-menu-chart-prices">
        <h2>Price Per Month</h2>
        <h2>$<?php echo $data['cat_plan_price']; ?></h2>
        <h2>$<?php echo $data['cat_plan_price'] + $data['plus_plan_premium']; ?></h2>
        <h2>$<?php echo $data['cat_plan_price'] + $data['elite_plan_premium']; ?></h2>
      </div>
    </div>
  </div>
</div>
<!-- Dog Plan Modal -->
<div id="dog-chart-modal" class="modal">
  <span class="close-modal">&#10005;</span>
  <div class="modal-content">
    <div class="plan-menu-chart-container">
      <h1 class="plan-menu-chart-header">Canine Wellness Plans</h1>
      <div class="plan-menu-chart-grid">
        <h2><i class="far fa-plus-square"></i><br>Service</h2>
        <h2><i class="far fa-circle"></i><br>Basic</h2>
        <h2><i class="far fa-square"></i><br>Plus</h2>
        <h2><i class="far fa-star"></i><br>Elite</h2>
      </div>
      <div class="plan-menu-chart-grid">
        <div id="plan-menu-dog-service-list" class="plan-menu-chart-flex">
        </div>
        <div id="plan-menu-dog-basic-plan" class="plan-menu-chart-flex plan-menu-icon-list">
        </div>
        <div id="plan-menu-dog-plus-plan" class="plan-menu-chart-flex plan-menu-icon-list">
        </div>
        <div id="plan-menu-dog-elite-plan" class="plan-menu-chart-flex plan-menu-icon-list">
        </div>
      </div>
      <div class="plan-menu-chart-grid plan-menu-chart-prices">
        <h2>Price Per Month</h2>
        <h2>$<?php echo $data['dog_plan_price']; ?></h2>
        <h2>$<?php echo $data['dog_plan_price'] + $data['plus_plan_premium']; ?></h2>
        <h2>$<?php echo $data['dog_plan_price'] + $data['elite_plan_premium']; ?></h2>
      </div>
    </div>
  </div>
</div>
<?php
return ob_get_clean();
}

add_shortcode('plan_menu', 'plan_menu');
function plan_menu_assets() {
wp_enqueue_style( 'PMstyles',  plugin_dir_url( __FILE__ ) . '/plan-menu.css' );
}
add_action('wp_enqueue_scripts', 'plan_menu_assets');

?>
