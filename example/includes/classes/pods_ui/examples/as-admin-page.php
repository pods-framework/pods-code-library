<?php
/**
 * This basic example is to illustrate functionality. It reproduces what Pods already does automatically.
 */
add_action( 'admin_menu', 'slug_admin_page' );
function slug_admin_page() {
	add_menu_page( 'CPT Admin', 'CPT Admin', 'edit_posts', 'menu-slug', 'slug_cpt_ui', 'dashicons-admin-site');

}

function slug_cpt_ui() {
	$pods = pods('cpt');
	return $pods->ui();
}

/**
 * This example shows how to create an alternate UI for non-admin users with diminished capabilites.
 * Be sure to set the third arg in add_menu_page to the right capability. See http://codex.wordpress.org/Roles_and_Capabilities
 *
 */
add_action( 'admin_menu', 'slug_admin_page' );
function slug_admin_page() {
	add_menu_page( 'CPT Admin', 'CPT Admin', 'edit_posts', 'menu-slug', 'slug_cpt_ui', 'dashicons-admin-site');

}

/**
 * Note that by setting the second arg to true in pods::ui() these new settings override existing values, but all other values set in Pods Admin remain.
 */
function slug_cpt_ui() {
	$pods = pods('cpt');
	$override_options['fields'] = array('post_title', 'post_date', 'custom_field');
	$override_options[ 'actions_disabled' ] = array( 'edit', 'delete' );

	return $pods->ui( $override_options, true);
}