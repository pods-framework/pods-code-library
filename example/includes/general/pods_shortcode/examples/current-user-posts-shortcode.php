<?php
/**
 * Function for creating a custom shortcode to use to display only posts by current user in a custom post type.
 *
 * Example shortcode: [pods_by_current_user_cpt name="document" template="Document Template"]
 *
 * Supports all shortcode attributes from standard PODS shortcode:
 * http://pods.io/docs/learn/shortcodes/pods/
 *
 * Original source: https://gist.github.com/tripflex/1b3adfe40e2ad4f41313
 */
add_shortcode( 'pods_by_current_user_cpt', 'pods_by_current_user_cpt' );

function pods_by_current_user_cpt( $atts, $content = null ) {
	$current_user  = wp_get_current_user();
	$user_id       = $current_user->ID;
	$atts['where'] = 'post_author = ' . (int) $user_id;

	return pods_shortcode( $atts, $content );
}
