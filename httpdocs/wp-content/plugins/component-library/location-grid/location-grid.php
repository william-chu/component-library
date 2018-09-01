<?php
/*
Plugin Name: Location Grid
Description: Displays 3 hospital locations
Author: William Chu
Version: 0.1
*/
function location_grid($atts) {
  ob_start();
  wp_enqueue_script( 'LGscripts',  plugin_dir_url( __FILE__ ) . '/location-grid.js', array( 'jquery' ) );
  $data = shortcode_atts(array(
    'mission_text' => 'Description of the hospital mission',
    'hospital_location1' => 'Hospital Location Name',
		'hospital_street1' => 'Street Address (123 Main Street)',
    'hospital_city1' => 'City (ex. Portland)',
    'hospital_state1' => 'State (ex. OR)',
    'hospital_zip1' => 'Zip (ex. 97204)',
    'hospital_phone1' => '111.111.1111',
    'mon1' => '8AM - 5PM',
    'tue1' => '8AM - 5PM',
    'wed1' => '8AM - 5PM',
    'thu1' => '8AM - 5PM',
    'fri1' => '8AM - 5PM',
    'sat1' => '10AM - 5PM',
    'sun1' => '12PM - 5PM',
    'hospital_location2' => 'Hospital Location Name',
    'hospital_street2' => 'Street Address (123 Main Street)',
    'hospital_city2' => 'City (ex. Portland)',
    'hospital_state2' => 'State (ex. OR)',
    'hospital_zip2' => 'Zip (ex. 97204)',
    'hospital_phone2' => '222.222.2222',
    'mon2' => '8AM - 5PM',
    'tue2' => '8AM - 5PM',
    'wed2' => '8AM - 5PM',
    'thu2' => '8AM - 5PM',
    'fri2' => '8AM - 5PM',
    'sat2' => '10AM - 5PM',
    'sun2' => '12PM - 5PM',
    'hospital_location3' => 'Hospital Location Name',
    'hospital_street3' => 'Street Address (123 Main Street)',
    'hospital_city3' => 'City (ex. Portland)',
    'hospital_state3' => 'State (ex. OR)',
    'hospital_zip3' => 'Zip (ex. 97204)',
    'hospital_phone3' => '333.333.3333',
    'mon3' => '8AM - 5PM',
    'tue3' => '8AM - 5PM',
    'wed3' => '8AM - 5PM',
    'thu3' => '8AM - 5PM',
    'fri3' => '8AM - 5PM',
    'sat3' => '10AM - 5PM',
    'sun3' => '12PM - 5PM',
    'request_link' => '#',
	), $atts);
  wp_localize_script('LGscripts', 'LGdata', $data);
  // Takes data and converts to search string for map
  $hospital_address1 = $data['hospital_location1'] . " " . $data['hospital_street1'] . " " . $data['hospital_city1'] . " " . $data['hospital_state1'] . " " . $data['hospital_zip1'];
  $hospital_address2 = $data['hospital_location2'] . " " . $data['hospital_street2'] . " " . $data['hospital_city2'] . " " . $data['hospital_state2'] . " " . $data['hospital_zip2'];
  $hospital_address3 = $data['hospital_location3'] . " " . $data['hospital_street3'] . " " . $data['hospital_city3'] . " " . $data['hospital_state3'] . " " . $data['hospital_zip3'];
  $hospital_address1_formatted = str_replace(" ", "+", $hospital_address1);
  $hospital_address2_formatted = str_replace(" ", "+", $hospital_address2);
  $hospital_address3_formatted = str_replace(" ", "+", $hospital_address3);
  // Capture formatted addresses for JS
  $formattedAddresses = array(
    $hospital_address1_formatted,
    $hospital_address2_formatted,
    $hospital_address3_formatted,
  );
  wp_localize_script('LGscripts', 'LGformattedAddresses', $formattedAddresses);
	?>

	<div class="location-grid-container">
    <h1>Locations</h1>
    <div class="location-grid-rail">
      <p class="mission-text"><?php echo $data['mission_text']; ?></p>
      <div class="location-grid-button-grid">
        <button class="location-button" onclick="setHospital(0)"><?php echo $data['hospital_location1'] ?></button>
        <button class="location-button" onclick="setHospital(1)"><?php echo $data['hospital_location2'] ?></button>
        <button class="location-button" onclick="setHospital(2)"><?php echo $data['hospital_location3'] ?></button>
      </div>
      <div class="location-grid-grid">
        <div class="location-grid-map">
          <iframe width="100%" height="100%" id="location-grid-map" src="https://www.google.com/maps?&q=<?php echo $hospital_address1_formatted; ?>&output=embed" allowfullscreen></iframe>
        </div>
        <div class="location-grid-details">
          <h2><span id="location-grid-name"><?php echo $data['hospital_location1']; ?></span></h2>
          <p><span id="location-grid-address">
            <?php echo $data['hospital_street1'] ?>
            <br>
            <?php echo $data['hospital_city1'] . ', ' . $data['hospital_state1'] . ' ' . $data['hospital_zip1']; ?>
          </span></p>
          <a id="location-grid-phone-link" href="tel:+01-<?php echo $data['hospital_phone1']; ?>"<h3>&#9990; <span id="location-grid-phone"><?php echo $data['hospital_phone1']; ?></span></h3></a>
          <button class="request-button pulse" onclick="window.location='<?php echo $data['request_link']; ?>';">Request Appointment</button>
          <p>HOURS:</p>
          <div class="location-grid-hours-flex">
            <ul>
              <li>Monday</li>
              <li>Tuesday</li>
              <li>Wednesday</li>
              <li>Thursday</li>
              <li>Friday</li>
              <li>Saturday</li>
              <li>Sunday</li>
            </ul>
            <ul>
              <li><span id="location-grid-mon"><?php echo $data['mon1']; ?></span></li>
              <li><span id="location-grid-tue"><?php echo $data['tue1']; ?></span></li>
              <li><span id="location-grid-wed"><?php echo $data['wed1']; ?></span></li>
              <li><span id="location-grid-thu"><?php echo $data['thu1']; ?></span></li>
              <li><span id="location-grid-fri"><?php echo $data['fri1']; ?></span></li>
              <li><span id="location-grid-sat"><?php echo $data['sat1']; ?></span></li>
              <li><span id="location-grid-sun"><?php echo $data['sun1']; ?></span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode('location_grid', 'location_grid');
function location_grid_assets() {
  wp_enqueue_style( 'LGstyles',  plugin_dir_url( __FILE__ ) . '/location-grid.css' );
}
add_action('wp_enqueue_scripts', 'location_grid_assets');

?>
