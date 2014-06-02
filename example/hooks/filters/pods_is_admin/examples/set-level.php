<?php
/**
 * Set minimum capability to access Pods Admin menu.
 *
 * In multisite this defaults to super admin, this example shows how to allow admins to access Pods Admin
 */
add_filter( 'pods_is_admin', 'slug_let_admins_admin', 10, 3 );
function slug_let_admins_admin( $has_access, $cap, $capability ) {
	$capability = 'admin';
	return $capability;
}
