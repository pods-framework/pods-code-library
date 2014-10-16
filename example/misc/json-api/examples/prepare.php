<?php
/**
 * Use the WP-API/client-js for authenticating AJAX requests to Pods JSON API
 *
 * Requires https://github.com/WP-API/client-js
 */
add_action( 'wp_enqueue_scripts', 'json_api_client_js' );

