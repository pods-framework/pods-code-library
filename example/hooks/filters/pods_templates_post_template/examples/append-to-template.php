<?php
/**
 * Append content to the output of all Pods Templates after it is processed.
 *
 * $out is the content of the template
 */
add_filter( 'pods_templates_post_template', 'SLUG_after_template' );
function SLUG_after_template( $out ) {
	$out = $out.'<br><br>';

	return $out;
}
