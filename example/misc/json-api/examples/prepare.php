<?php
/**
 * Guide: http://wp-api.org/guides/authentication.html
 * Example for get-by-id.js - assuming its stored in your plugin Directory in /js
 * 
 */
wp_enqueue_script('get-by-id', plugins_url('js/get-by-id.js', __FILE__), array('jquery'), true);

//only necesarry once if you have multiple .js files 
$settings = array( 'root' => esc_url_raw( get_json_url() ), 'nonce' => wp_create_nonce( 'wp_json' ) );
wp_localize_script( 'get-by-id', 'WP_API_Settings', $settings );

