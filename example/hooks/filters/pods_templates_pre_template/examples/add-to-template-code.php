<?php
/**
 * Add to a Pods Template before processing magic tags.
 *
 * $code is the content of the template, unprocessed.
 */
add_filter( 'pods_templates_pre_template', 'SLUG_add_to_template' );
function SLUG_add_to_template( $code ) {
	$code = '<h3>{@post_title}</h3>';

	return $out;
}
