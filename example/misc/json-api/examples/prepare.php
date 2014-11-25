<?php
/**
 * Guide: http://wp-api.org/guides/authentication.html
 * Example for get-by-id.js - assuming its stored in your plugin Directory in /js
 * 
 */
 
//api-access for frontend" (only logged in Users) 
add_action( 'wp_enqueue_scripts', 'your_prefix_json_api_js' );

//api-access for wp-admin
add_action( 'admin_enqueue_scripts', 'your_prefix_json_api_js' );

function your_prefix_json_api_js{ 
  /**
	 * Check if WP API functionality exists. Not using is_plugin_active in prepartion for
	 */
	if ( ! function_exists( 'json_get_url' ) ) {
		return;
	}
  
  wp_enqueue_script('get-by-id', plugins_url('js/get-by-id.js', __FILE__), array('jquery'), true);

  //only necessary once if you have multiple .js files 
  $settings = array( 'root' => esc_url_raw( get_json_url() ), 'nonce' => wp_create_nonce( 'wp_json' ) );
  wp_localize_script( 'get-by-id', 'WP_API_Settings', $settings );
  
}
