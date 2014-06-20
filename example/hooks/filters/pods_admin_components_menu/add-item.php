<?php
/**
 * Add an item to components submenu. This example adapted from Pods AJAX Views plugin.
 *
 * NOTE: You must define callback function for the admin page.
 */

add_action( 'pods_admin_components_menu', 'SLUG_admin_menu' );
function SLUG_admin_menu( $admin_menus ) {

	$admin_menus[ 'AJAX Views' ] = array(
		'menu_page' => 'pods-ajax-views',
		'page_title' => __( 'Pods AJAX Views', 'pods-ajax-views' ),
		'capability' => 'manage_options',
		'callback' => 'SLUG_admin_page',
	);

	return $admin_menus;

}
