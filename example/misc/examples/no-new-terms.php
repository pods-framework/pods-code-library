<?php
/**
 * Prevent new terms from being added to a custom taxonomy
 *
 * Thanks to http://wordpress.stackexchange.com/a/112721/25300
 */

//prevent new terms from being added to the tutorial_type taxonomy
add_action( 'pre_insert_term', 'pods_no_new_tutorial_types', 1, 2);
function pods_no_new_tutorial_types ($term, $taxonomy) {
	if ('tutorial_type' === $taxonomy) {
		return new WP_Error('term_addition_blocked', __('You cannot add terms to this taxonomy'));
	}
}
