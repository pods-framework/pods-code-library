<?php
/**
 * Add capabilities, that can be assigned to user roles for managing custom taxonomy terms.
 */
add_filter( 'pods_wp_taxonomies', 'slug_edit_country_taxonomy' );
function edit_country_taxonomy($taxonomies) {

	$taxonomies[ 'country' ][ 'capabilities' ] = array(
		'assign_terms' 	=> 'assign_country',
		'edit_terms' 	=> 'edit_country',
		'manage_terms' 	=> 'manage_country',
		'delete_terms' 	=> 'delete_country'
	);

	return $taxonomies;

}
