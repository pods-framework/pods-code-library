<?php
/**
 * Use the WP-API/client-js for authenticating AJAX requests to Pods JSON API
 *
 * Requires https://github.com/WP-API/client-js
 */
add_action( 'wp_enqueue_scripts', 'json_api_client_js' );
add_action( 'wp_enqueue_scripts', 'json_api_talk_scripts' );
function json_api_talk_scripts() {
	if ( ! function_exists( 'json_get_url_prefix' ) ) {
		return;
	}
	wp_enqueue_script( 'json-api-talk', plugins_url( '/json-api-talk.js', __FILE__ ), array( 'jquery' ), '1.0', true );

}
