<?php
/**
 * The third argument for Pods::save() can be used to set a URL to redirect to on form submission.
 *
 * This example shows how to redirect to a new item created using Pods::form()
 */

/**Output the form**/
//setup fields
$fields = array( 'dressings', 'lettuce_type' );

//customize submit button
$save_button = 'Add New Salad';

//location to redirect on submission
//X_ID_X will be repalaced with new item ID
$thank_you = site_url( '?new_salad=X_ID_X' );

//output  the form
echo pods( 'salads' )->form( $fields, $ave_button, $thank_you );

/*
 * Create the redirect.
 *
 * IMPORTANT: This function does not go in the template, but in a plugin or the theme's functions.php
 */
add_action( 'init', 'SLUG_new_salad_redirect' );
function SLUG_new_salad_redirect() {
	//check if new_salad GET variable isset, act only if it is
	if ( false !== ( $new_salad_id = pods_v( 'new_salad', 'get', false, true ) ) ) {

		//use the value to get the link to the item and then redirect to it.
		//get peramlink only works for post types.
		///Use get_term_link for taxonomies or build link manually for advanced content types
		pods_redirect( get_permalink( $new_salad_id ) );

	}
	
}
