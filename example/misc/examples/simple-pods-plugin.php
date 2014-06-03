<?php
/*
Plugin Name: Pods Starter Plugin
Version: 0.0.1
License: GPL v2 or later
*/

//note: change 'slug' to your own custom prefix.
add_action( 'plugins_loaded', 'slug_extend_safe_activate');
function slug_extend_safe_activate() {
	if ( defined( 'PODS_VERSION' ) ) {
		include_once( 'custom-code.php');
	}

}
